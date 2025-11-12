<?php

/**
 * Category Helper Functions
 * 
 * Kategori ile ilgili yardımcı fonksiyonlar
 */

use App\Models\Category;

if (!function_exists('category_hierarchy_options')) {
    /**
     * Kategorileri hiyerarşik olarak select option'larına dönüştürür
     * 
     * @param int|null $parentId Üst kategori ID'si (null ise tüm kategoriler)
     * @param int $level Mevcut seviye (iç kullanım için)
     * @param array $excludeIds Hariç tutulacak kategori ID'leri
     * @return array [['value' => id, 'text' => name, 'level' => level], ...]
     */
    function category_hierarchy_options(?int $parentId = null, int $level = 0, array $excludeIds = []): array
    {
        $options = [];

        $categories = Category::query()
            ->where('parent_id', $parentId)
            ->where('is_active', true)
            ->whereNotIn('id', $excludeIds)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        foreach ($categories as $category) {
            $prefix = str_repeat('-', $level);
            $text = $level > 0 ? $prefix . ' ' . $category->name : $category->name;

            $options[] = [
                'value' => $category->id,
                'text' => $text,
                'level' => $level,
            ];

            // Alt kategorileri recursive olarak ekle
            $childOptions = category_hierarchy_options($category->id, $level + 1, $excludeIds);
            $options = array_merge($options, $childOptions);
        }

        return $options;
    }
}

if (!function_exists('category_select_options')) {
    /**
     * Kategorileri HTML select option formatında döndürür
     * 
     * @param int|null $selectedId Seçili kategori ID'si
     * @param string $emptyText İlk option metni (varsayılan: "All Categories")
     * @param array $excludeIds Hariç tutulacak kategori ID'leri
     * @return string HTML option etiketleri
     */
    function category_select_options(?int $selectedId = null, string $emptyText = 'All Categories', array $excludeIds = []): string
    {
        $options = [];

        // İlk boş option
        if ($emptyText !== '') {
            $selected = $selectedId === null ? ' selected' : '';
            $options[] = '<option value=""' . $selected . '>' . htmlspecialchars($emptyText) . '</option>';
        }

        // Hiyerarşik kategoriler
        $categoryOptions = category_hierarchy_options(null, 0, $excludeIds);

        foreach ($categoryOptions as $option) {
            $selected = ($selectedId === $option['value']) ? ' selected' : '';
            $options[] = '<option value="' . $option['value'] . '"' . $selected . '>' . htmlspecialchars($option['text']) . '</option>';
        }

        return implode("\n", $options);
    }
}

if (!function_exists('category_tree')) {
    /**
     * Kategorileri tree yapısında döndürür (array formatında)
     * 
     * @param int|null $parentId Üst kategori ID'si
     * @return array Tree yapısında kategori dizisi
     */
    function category_tree(?int $parentId = null): array
    {
        $categories = Category::query()
            ->where('parent_id', $parentId)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $tree = [];

        foreach ($categories as $category) {
            $item = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'parent_id' => $category->parent_id,
                'children' => category_tree($category->id),
            ];

            $tree[] = $item;
        }

        return $tree;
    }
}

if (!function_exists('category_tree_chunked')) {
    /**
     * Kategorileri tree yapısında döndürür ve belirtilen sayıda parçaya böler
     * 
     * @param int $chunks Kaç parçaya bölüneceği (varsayılan: 2)
     * @return array Chunk'lanmış kategori dizisi
     */
    function category_tree_chunked(int $chunks = 2): array
    {
        $categories = category_tree();
        $totalCategories = count($categories);

        if ($totalCategories === 0) {
            return [];
        }

        return array_chunk($categories, ceil($totalCategories / $chunks));
    }
}

if (!function_exists('get_menu_by_location')) {
    /**
     * Belirtilen lokasyondaki aktif menüyü döndürür
     * 
     * @param string $location Menü lokasyonu (sidebar, header, footer vb.)
     * @return array|null Menü items dizisi veya null
     */
    function get_menu_by_location(string $location): ?array
    {
        $menu = \App\Models\Menu::query()
            ->where('location', $location)
            ->where('is_active', true)
            ->first();

        return $menu ? $menu->items : null;
    }
}

if (!function_exists('render_menu_items')) {
    /**
     * Menü öğelerini recursive olarak render eder
     * 
     * @param array $items Menü öğeleri dizisi
     * @param int $level Mevcut seviye (iç kullanım için)
     * @return string HTML çıktısı
     */
    function render_menu_items(array $items, int $level = 0): string
    {
        $html = '';

        foreach ($items as $item) {
            if (!($item['is_active'] ?? true)) {
                continue;
            }

            $hasChildren = !empty($item['children']) && is_array($item['children']);
            $icon = $item['icon'] ?? '';
            $url = $item['url'] ?? '#';
            $target = $item['target'] ?? '_self';
            $badge = $item['badge'] ?? null;
            $badgeType = $item['badge_type'] ?? 'tip-new';

            if ($level === 0) {
                // Ana menü öğesi
                $html .= '<li>';
                $html .= '<a href="' . htmlspecialchars($url) . '"';

                if ($hasChildren) {
                    $html .= ' class="sf-with-ul"';
                }

                if ($target === '_blank') {
                    $html .= ' target="_blank"';
                }

                $html .= '>';

                if ($icon) {
                    $html .= '<i class="' . htmlspecialchars($icon) . '"></i>';
                }

                $html .= htmlspecialchars(__($item['name'] ?? ''));

                if ($badge) {
                    $html .= '<span class="tip ' . htmlspecialchars($badgeType) . '">' . htmlspecialchars(__($badge)) . '</span>';
                }

                $html .= '</a>';

                // Megamenu veya alt menü
                if ($hasChildren && isset($item['menu_type']) && $item['menu_type'] === 'megamenu') {
                    $html .= render_megamenu($item['children'], $item['megamenu_cols'] ?? 3);
                } elseif ($hasChildren && isset($item['menu_type']) && $item['menu_type'] === 'categories') {
                    // Kategoriler için özel megamenu
                    $html .= render_categories_megamenu();
                } elseif ($hasChildren) {
                    $html .= '<ul>';
                    $html .= render_menu_items($item['children'], $level + 1);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            } else {
                // Alt menü öğesi
                $html .= '<li>';
                $html .= '<a href="' . htmlspecialchars($url) . '"';

                if ($target === '_blank') {
                    $html .= ' target="_blank"';
                }

                $html .= '>';
                $html .= htmlspecialchars(__($item['name'] ?? ''));
                $html .= '</a>';

                if ($hasChildren) {
                    $html .= '<ul>';
                    $html .= render_menu_items($item['children'], $level + 1);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }
}

if (!function_exists('render_megamenu')) {
    /**
     * Megamenu yapısını render eder
     * 
     * @param array $items Menü öğeleri dizisi
     * @param int $cols Kolon sayısı (varsayılan: 3)
     * @return string HTML çıktısı
     */
    function render_megamenu(array $items, int $cols = 3): string
    {
        $html = '<div class="megamenu megamenu-fixed-width megamenu-' . $cols . 'cols">';
        $html .= '<div class="row">';

        $chunkedItems = array_chunk($items, ceil(count($items) / ($cols - 1)));

        foreach ($chunkedItems as $chunkIndex => $chunk) {
            if ($chunkIndex < ($cols - 1)) {
                $html .= '<div class="col-lg-' . (12 / $cols) . '">';

                if ($chunkIndex === 0 && isset($chunk[0]['section_title'])) {
                    $html .= '<a href="#" class="nolink pl-0">' . htmlspecialchars(__($chunk[0]['section_title'])) . '</a>';
                }

                $html .= '<ul class="submenu">';

                foreach ($chunk as $item) {
                    if (!($item['is_active'] ?? true)) {
                        continue;
                    }

                    $url = $item['url'] ?? '#';
                    $target = $item['target'] ?? '_self';
                    $hasChildren = !empty($item['children']) && is_array($item['children']);

                    $html .= '<li>';
                    $html .= '<a href="' . htmlspecialchars($url) . '"';

                    if ($target === '_blank') {
                        $html .= ' target="_blank"';
                    }

                    $html .= '>';
                    $html .= htmlspecialchars(__($item['name'] ?? ''));
                    $html .= '</a>';

                    if ($hasChildren) {
                        $html .= '<ul>';
                        foreach ($item['children'] as $child) {
                            if (!($child['is_active'] ?? true)) {
                                continue;
                            }
                            $html .= '<li>';
                            $html .= '<a href="' . htmlspecialchars($child['url'] ?? '#') . '">';
                            $html .= htmlspecialchars(__($child['name'] ?? ''));
                            $html .= '</a>';
                            $html .= '</li>';
                        }
                        $html .= '</ul>';
                    }

                    $html .= '</li>';
                }

                $html .= '</ul>';
                $html .= '</div>';
            }
        }

        // Banner kolonu (son kolon)
        $html .= '<div class="col-lg-' . (12 / $cols) . ' p-0">';
        $html .= '<div class="menu-banner">';
        $html .= '<figure>';
        $html .= '<img src="/porto/assets/images/menu-banner.jpg" width="192" height="313" alt="' . __('Menu banner') . '">';
        $html .= '</figure>';
        $html .= '<div class="banner-content">';
        $html .= '<h4>';
        $html .= '<span>' . __('UP TO') . '</span><br>';
        $html .= '<b>50%</b>';
        $html .= '<i>' . __('OFF') . '</i>';
        $html .= '</h4>';
        $html .= '<a href="/porto/demo1-shop.html" class="btn btn-sm btn-dark">' . __('SHOP NOW') . '</a>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}

if (!function_exists('render_categories_megamenu')) {
    /**
     * Kategoriler için megamenu render eder
     * 
     * @return string HTML çıktısı
     */
    function render_categories_megamenu(): string
    {
        $categories = category_tree();
        $chunkedCategories = category_tree_chunked(2);

        if (empty($categories)) {
            return '';
        }

        $html = '<div class="megamenu megamenu-fixed-width megamenu-3cols">';
        $html .= '<div class="row">';

        foreach ($chunkedCategories as $chunkIndex => $chunk) {
            if ($chunkIndex < 2) {
                $html .= '<div class="col-lg-4">';

                if ($chunkIndex === 0) {
                    $html .= '<a href="#" class="nolink pl-0">' . __('Categories') . '</a>';
                }

                $html .= '<ul class="submenu">';

                foreach ($chunk ?? [] as $category) {
                    $html .= '<li>';
                    $html .= '<a href="/porto/demo1-shop.html?category=' . htmlspecialchars($category['slug']) . '">';
                    $html .= htmlspecialchars($category['name']);

                    if (count($category['children']) > 0) {
                        $html .= '<span class="tip tip-new">' . __('New') . '</span>';
                    }

                    $html .= '</a>';

                    if (count($category['children']) > 0) {
                        $html .= '<ul>';
                        foreach ($category['children'] as $child) {
                            $html .= '<li>';
                            $html .= '<a href="/porto/demo1-shop.html?category=' . htmlspecialchars($child['slug']) . '">';
                            $html .= htmlspecialchars($child['name']);
                            $html .= '</a>';
                            $html .= '</li>';
                        }
                        $html .= '</ul>';
                    }

                    $html .= '</li>';
                }

                $html .= '</ul>';
                $html .= '</div>';
            }
        }

        // Banner kolonu
        $html .= '<div class="col-lg-4 p-0">';
        $html .= '<div class="menu-banner">';
        $html .= '<figure>';
        $html .= '<img src="/porto/assets/images/menu-banner.jpg" width="192" height="313" alt="' . __('Menu banner') . '">';
        $html .= '</figure>';
        $html .= '<div class="banner-content">';
        $html .= '<h4>';
        $html .= '<span>' . __('UP TO') . '</span><br>';
        $html .= '<b>50%</b>';
        $html .= '<i>' . __('OFF') . '</i>';
        $html .= '</h4>';
        $html .= '<a href="/porto/demo1-shop.html" class="btn btn-sm btn-dark">' . __('SHOP NOW') . '</a>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
