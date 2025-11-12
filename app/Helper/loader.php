<?php

/**
 * Helper Loader
 * 
 * Bu dosya app/Helper dizinindeki tüm *_helper.php dosyalarını otomatik olarak yükler.
 * Composer autoload ile entegre edilmiştir.
 */

$helperDir = __DIR__;
$helperFiles = glob($helperDir . '/*_helper.php');

foreach ($helperFiles as $helperFile) {
    if (file_exists($helperFile)) {
        require_once $helperFile;
    }
}
