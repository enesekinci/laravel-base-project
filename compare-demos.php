<?php

/**
 * Bu script 42 demo'yu remote ve local karşılaştırır
 */

$baseLocal = __DIR__ . "/porto_ecommerce_html_v1.6.0";
$baseRemote = "https://shop.test/porto";
$outputDir = __DIR__ . "/demo-comparison";

// Output dizinini oluştur
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

$results = [];
$errors = [];

echo "=== DEMO KARŞILAŞTIRMA BAŞLADI ===\n\n";

for ($i = 1; $i <= 42; $i++) {
    $demoNum = $i;
    $localFile = "{$baseLocal}/demo{$demoNum}.html";
    $remoteUrl = "{$baseRemote}/demo{$demoNum}.html";

    echo "Demo {$demoNum} kontrol ediliyor...\n";

    // Local dosya var mı?
    if (!file_exists($localFile)) {
        $errors[] = "Demo {$demoNum}: Local dosya bulunamadı: {$localFile}";
        echo "  ❌ Local dosya yok\n";
        continue;
    }

    // Remote'dan çek
    $ch = curl_init($remoteUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $remoteContent = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200 || $remoteContent === false) {
        $errors[] = "Demo {$demoNum}: Remote erişim hatası (HTTP {$httpCode})";
        echo "  ❌ Remote erişim hatası (HTTP {$httpCode})\n";
        continue;
    }

    // Local dosyayı oku
    $localContent = file_get_contents($localFile);

    // İçerikleri normalize et (whitespace, path'ler vb.)
    $remoteNormalized = normalizeContent($remoteContent);
    $localNormalized = normalizeContent($localContent);

    // Karşılaştır
    $differences = compareContent($remoteNormalized, $localNormalized, $demoNum);

    $results[$demoNum] = [
        'local_size' => strlen($localContent),
        'remote_size' => strlen($remoteContent),
        'differences' => $differences,
        'has_errors' => !empty($differences['errors']),
        'has_warnings' => !empty($differences['warnings']),
    ];

    if (empty($differences['errors']) && empty($differences['warnings'])) {
        echo "  ✅ Tamamen eşleşiyor\n";
    } else {
        echo "  ⚠️  Farklılıklar bulundu:\n";
        if (!empty($differences['errors'])) {
            echo "     - Hatalar: " . count($differences['errors']) . "\n";
        }
        if (!empty($differences['warnings'])) {
            echo "     - Uyarılar: " . count($differences['warnings']) . "\n";
        }
    }

    // Diff dosyası oluştur
    if (!empty($differences['errors']) || !empty($differences['warnings'])) {
        $diffFile = "{$outputDir}/demo{$demoNum}-diff.txt";
        $diffReport = "=== DEMO {$demoNum} KARŞILAŞTIRMA RAPORU ===\n\n";
        $diffReport .= "Hatalar:\n";
        if (empty($differences['errors'])) {
            $diffReport .= "  Yok\n";
        } else {
            foreach ($differences['errors'] as $error) {
                $diffReport .= "  ❌ {$error}\n";
            }
        }
        $diffReport .= "\nUyarılar:\n";
        if (empty($differences['warnings'])) {
            $diffReport .= "  Yok\n";
        } else {
            foreach ($differences['warnings'] as $warning) {
                $diffReport .= "  ⚠️  {$warning}\n";
            }
        }
        $diffReport .= "\n--- Boyut Bilgileri ---\n";
        $diffReport .= "Remote: " . strlen($remoteContent) . " bytes\n";
        $diffReport .= "Local: " . strlen($localContent) . " bytes\n";
        $diffReport .= "Fark: " . abs(strlen($remoteContent) - strlen($localContent)) . " bytes\n";
        file_put_contents($diffFile, $diffReport);
    }
}

// Özet rapor
echo "\n=== ÖZET RAPOR ===\n";
$totalDemos = count($results);
$perfectMatches = count(array_filter($results, function ($r) {
    return empty($r['has_errors']) && empty($r['has_warnings']);
}));
$withErrors = count(array_filter($results, function ($r) {
    return $r['has_errors'];
}));
$withWarnings = count(array_filter($results, function ($r) {
    return $r['has_warnings'];
}));

echo "Toplam Demo: {$totalDemos}\n";
echo "Tamamen Eşleşen: {$perfectMatches}\n";
echo "Hata Olan: {$withErrors}\n";
echo "Uyarı Olan: {$withWarnings}\n";

if (!empty($errors)) {
    echo "\n=== HATALAR ===\n";
    foreach ($errors as $error) {
        echo "{$error}\n";
    }
}

// Sorunlu demo'ları listele
echo "\n=== SORUNLU DEMO'LAR ===\n";
foreach ($results as $demoNum => $result) {
    if ($result['has_errors'] || $result['has_warnings']) {
        echo "Demo {$demoNum}:\n";
        if (!empty($result['differences']['errors'])) {
            foreach (array_slice($result['differences']['errors'], 0, 3) as $error) {
                echo "  ❌ {$error}\n";
            }
        }
        if (!empty($result['differences']['warnings'])) {
            foreach (array_slice($result['differences']['warnings'], 0, 3) as $warning) {
                echo "  ⚠️  {$warning}\n";
            }
        }
        echo "\n";
    }
}

echo "\nDetaylı diff dosyaları: {$outputDir}/\n";
echo "=== TAMAMLANDI ===\n";

function normalizeContent($content)
{
    // Whitespace'leri normalize et
    $content = preg_replace('/\s+/', ' ', $content);
    // Path'leri normalize et (local vs remote)
    $content = str_replace('assets/', '/porto/assets/', $content);
    $content = str_replace('href="demo', 'href="/porto/demo', $content);
    $content = str_replace('href="category', 'href="/porto/category', $content);
    $content = str_replace('href="product', 'href="/porto/product', $content);
    return trim($content);
}

function compareContent($remote, $local, $demoNum)
{
    $differences = [
        'errors' => [],
        'warnings' => []
    ];

    // Önemli section'ları kontrol et
    $sections = [
        'header' => '/<header[^>]*>(.*?)<\/header>/is',
        'footer' => '/<footer[^>]*>(.*?)<\/footer>/is',
        'top-notice' => '/<div[^>]*class="top-notice[^"]*"[^>]*>(.*?)<\/div>/is',
        'main' => '/<main[^>]*>(.*?)<\/main>/is',
    ];

    foreach ($sections as $sectionName => $pattern) {
        $remoteMatch = preg_match($pattern, $remote, $remoteSection);
        $localMatch = preg_match($pattern, $local, $localSection);

        if ($remoteMatch && $localMatch) {
            $remoteSection[0] = normalizeContent($remoteSection[0]);
            $localSection[0] = normalizeContent($localSection[0]);

            if ($remoteSection[0] !== $localSection[0]) {
                // Class'ları kontrol et
                preg_match('/class="([^"]*)"/', $remoteSection[0], $remoteClass);
                preg_match('/class="([^"]*)"/', $localSection[0], $localClass);

                if ((isset($remoteClass[1]) && isset($localClass[1])) && $remoteClass[1] !== $localClass[1]) {
                    $differences['errors'][] = "{$sectionName} class'ı farklı: Remote='{$remoteClass[1]}' vs Local='{$localClass[1]}'";
                } else {
                    $remoteLength = strlen($remoteSection[0]);
                    $localLength = strlen($localSection[0]);
                    $diffPercent = abs($remoteLength - $localLength) / max($remoteLength, $localLength) * 100;

                    if ($diffPercent > 10) {
                        $differences['errors'][] = "{$sectionName} içeriği %{$diffPercent} farklı";
                    } else {
                        $differences['warnings'][] = "{$sectionName} içeriği küçük farklılıklar var";
                    }
                }
            }
        } else if ($remoteMatch && !$localMatch) {
            $differences['errors'][] = "{$sectionName} remote'da var ama local'de yok";
        } else if (!$remoteMatch && $localMatch) {
            $differences['errors'][] = "{$sectionName} local'de var ama remote'da yok";
        }
    }

    // Banner sayısını kontrol et
    $remoteBanners = preg_match_all('/<div[^>]*class="[^"]*banner[^"]*"[^>]*>/i', $remote);
    $localBanners = preg_match_all('/<div[^>]*class="[^"]*banner[^"]*"[^>]*>/i', $local);

    if ($remoteBanners !== $localBanners) {
        $differences['errors'][] = "Banner sayısı farklı: Remote={$remoteBanners}, Local={$localBanners}";
    }

    // Product card sayısını kontrol et
    $remoteProducts = preg_match_all('/<div[^>]*class="[^"]*product[^"]*"[^>]*>/i', $remote);
    $localProducts = preg_match_all('/<div[^>]*class="[^"]*product[^"]*"[^>]*>/i', $local);

    if (abs($remoteProducts - $localProducts) > 5) {
        $differences['warnings'][] = "Product sayısı farklı: Remote={$remoteProducts}, Local={$localProducts}";
    }

    return $differences;
}

function generateDiffReport($demoNum, $differences, $remoteContent, $localContent)
{
    $report = "=== DEMO {$demoNum} KARŞILAŞTIRMA RAPORU ===\n\n";

    $report .= "Hatalar:\n";
    if (empty($differences['errors'])) {
        $report .= "  Yok\n";
    } else {
        foreach ($differences['errors'] as $error) {
            $report .= "  ❌ {$error}\n";
        }
    }

    $report .= "\nUyarılar:\n";
    if (empty($differences['warnings'])) {
        $report .= "  Yok\n";
    } else {
        foreach ($differences['warnings'] as $warning) {
            $report .= "  ⚠️  {$warning}\n";
        }
    }

    $report .= "\n--- Boyut Bilgileri ---\n";
    $report .= "Remote: " . strlen($remoteContent) . " bytes\n";
    $report .= "Local: " . strlen($localContent) . " bytes\n";
    $report .= "Fark: " . abs(strlen($remoteContent) - strlen($localContent)) . " bytes\n";

    return $report;
}
