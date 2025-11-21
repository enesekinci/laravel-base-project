<?php

if (!function_exists('page_route')) {
    /**
     * Sayfa route helper
     *
     * @param string $page Sayfa adı (örn: 'index', 'shop', 'product')
     * @param array $params Query parametreleri
     * @return string
     */
    function page_route(string $page, array $params = []): string
    {
        $url = route('page', ['page' => $page]);

        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        return $url;
    }
}

if (!function_exists('product_url')) {
    /**
     * Ürün detay sayfası URL'i
     *
     * @param string $slug Ürün slug'ı
     * @return string
     */
    function product_url(string $slug): string
    {
        return page_route('product', ['product' => $slug]);
    }
}

if (!function_exists('blog_single_url')) {
    /**
     * Blog single sayfası URL'i
     *
     * @param string $slug Blog post slug'ı
     * @return string
     */
    function blog_single_url(string $slug): string
    {
        return page_route('single', ['post' => $slug]);
    }
}

if (!function_exists('shop_url')) {
    /**
     * Shop sayfası URL'i
     *
     * @param array $params Query parametreleri (category, tag, vb.)
     * @return string
     */
    function shop_url(array $params = []): string
    {
        return page_route('shop', $params);
    }
}
