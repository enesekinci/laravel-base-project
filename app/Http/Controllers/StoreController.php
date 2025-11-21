<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Attribute;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Faq;
use App\Models\FeatureBox;
use App\Models\InfoBox;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ShippingMethod;
use App\Models\Slider;
use App\Models\State;
use App\Models\Tag;
use App\Models\User;
use App\Models\Wishlist;
use App\Services\StoreSettingService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    /**
     * Store sayfalarını render eder
     */
    public function show(?string $page = null): Response
    {
        if (empty($page)) {
            $page = 'index';
        }

        $page = str_replace('.html', '', $page);

        // Önce DB'den dinamik sayfa ara
        $dynamicPage = Page::where('slug', $page)
            ->where('is_active', true)
            ->first();

        if ($dynamicPage) {
            return $this->renderDynamicPage($dynamicPage);
        }

        // Sonra pages klasöründe ara
        $bladeView = "pages.{$page}";
        if (view()->exists($bladeView)) {
            return $this->renderBladeView($bladeView, $page);
        }

        // Sonra eski view klasöründe ara (fallback)
        $oldBladeView = "porto.{$page}";
        if (view()->exists($oldBladeView)) {
            return $this->renderBladeView($oldBladeView, $page);
        }

        // HTML dosyası olarak ara (fallback)
        $htmlPath = resource_path("views/porto/{$page}.html");

        if (!File::exists($htmlPath)) {
            abort(404, "Sayfa bulunamadı: {$page}");
        }

        $content = File::get($htmlPath);

        return response($content)->header('Content-Type', 'text/html; charset=utf-8');
    }

    /**
     * Dinamik sayfa render eder
     */
    private function renderDynamicPage(Page $page): Response
    {
        $demoCss = $this->resolveDemoCss('page');
        $baseData = $this->getBaseViewData('page', $demoCss);

        $pageData = [
            'page' => [
                'title' => $page->title,
                'content' => $page->content,
                'meta_title' => $page->meta_title ?? $page->title,
                'meta_description' => $page->meta_description,
            ],
        ];

        return response()->view('pages.dynamic-page', array_merge($baseData, $pageData));
    }

    /**
     * Blade view'larını ortak verilerle render eder
     */
    private function renderBladeView(string $view, string $page): Response
    {
        $demoCss = $this->resolveDemoCss($page);
        $baseData = $this->getBaseViewData($page, $demoCss);
        $pageData = $this->resolvePageData($view, $page);

        return response()->view($view, array_merge($baseData, $pageData));
    }

    /**
     * Demo CSS dosyasını belirler
     */
    private function resolveDemoCss(string $page): ?string
    {
        if ($page === 'dashboard') {
            return null;
        }

        return 'demo1'; // CSS dosyası hala demo1.min.css olarak derleniyor
    }

    /**
     * Tüm sayfalar için ortak template verilerini döndürür
     */
    private function getBaseViewData(string $page, ?string $demoCss): array
    {
        return [
            'demoCss' => $demoCss,
            'mainClass' => $this->getMainClass($page),
            'bodyClass' => $this->getBodyClass($page),
            'bodyAttributes' => $this->getBodyAttributes($page),
        ];
    }

    /**
     * Sayfa bazlı verileri belirler
     */
    private function resolvePageData(string $bladeView, string $page): array
    {
        return match (true) {
            $bladeView === 'pages.index' || $page === 'index' => $this->getDemo1Data(),
            in_array($bladeView, ['pages.about', 'porto.about'], true) || $page === 'about' => $this->getAboutData(),
            in_array($bladeView, ['pages.contact', 'porto.contact'], true) || $page === 'contact' => $this->getContactData(),
            in_array($bladeView, ['pages.blog', 'porto.blog'], true) || $page === 'blog' => $this->getBlogPageData(),
            in_array($bladeView, ['pages.single', 'porto.single'], true) || $page === 'single' => $this->getBlogSingleData(),
            in_array($bladeView, ['pages.shop', 'porto.shop'], true) || $page === 'shop' => $this->getShopData(),
            in_array($bladeView, ['pages.product', 'porto.product'], true) || $page === 'product' => $this->getProductDetailData(),
            in_array($bladeView, ['pages.cart', 'porto.cart'], true) || $page === 'cart' => $this->getCartData(),
            in_array($bladeView, ['pages.checkout', 'porto.checkout'], true) || $page === 'checkout' => $this->getCheckoutData(),
            in_array($bladeView, ['pages.wishlist', 'porto.wishlist'], true) || $page === 'wishlist' => $this->getWishlistData(),
            in_array($bladeView, ['pages.dashboard', 'porto.dashboard'], true) || $page === 'dashboard' => $this->getDashboardData(),
            $bladeView === 'pages.dynamic-page' => [],
            default => [],
        };
    }

    /**
     * Sayfa için doğru main class'ını döndürür
     */
    private function getMainClass(string $page): string
    {
        // JSON dosyasından class'ı oku
        $classesFile = base_path('demo-classes.json');
        if (file_exists($classesFile)) {
            $classes = json_decode(file_get_contents($classesFile), true);
            if (isset($classes['1']['main'])) {
                $mainClass = $classes['1']['main'];
                // "main" kelimesini kaldır, sadece ek class'ları döndür
                $classParts = explode(' ', $mainClass);
                $classParts = array_filter($classParts, function ($part) {
                    return trim($part) !== 'main';
                });
                $mainClass = implode(' ', $classParts);
                $mainClass = trim($mainClass);

                // Sayfa tipine göre ek class ekle
                if (str_contains($page, 'shop')) {
                    return $mainClass . ' shop';
                } elseif (str_contains($page, 'product')) {
                    return $mainClass . ' product';
                } elseif (str_contains($page, 'category')) {
                    return $mainClass . ' category';
                } elseif (str_contains($page, 'cart') || str_contains($page, 'checkout')) {
                    return $mainClass . ' checkout';
                } elseif (str_contains($page, 'about') || str_contains($page, 'contact')) {
                    return $mainClass . ' about';
                } elseif (str_contains($page, 'blog')) {
                    return $mainClass . ' blog';
                }

                return $mainClass;
            }
        }

        // Fallback: Sayfa tipine göre class belirle
        if (str_contains($page, 'shop')) {
            return 'shop';
        } elseif (str_contains($page, 'product')) {
            return 'product';
        } elseif (str_contains($page, 'category')) {
            return 'category';
        } elseif (str_contains($page, 'cart') || str_contains($page, 'checkout')) {
            return 'checkout';
        } elseif (str_contains($page, 'about') || str_contains($page, 'contact')) {
            return 'about';
        } elseif (str_contains($page, 'blog')) {
            return 'blog';
        } elseif ($page === 'index') {
            return 'home';
        }

        return '';
    }

    /**
     * Sayfa için body class'ını döndürür
     */
    private function getBodyClass(string $page): ?string
    {
        // Demo1 için özel body class yok
        return null;
    }

    /**
     * Sayfa için body attributes'ını döndürür
     */
    private function getBodyAttributes(string $page): ?string
    {
        // Demo1 için özel body attributes yok
        return null;
    }

    /**
     * Anasayfa için dinamik verileri döndürür
     */
    private function getDemo1Data(): array
    {
        return [
            // Sliders
            'sliders' => Slider::active()
                ->byLocation('home')
                ->ordered()
                ->get()
                ->map(fn($slider) => [
                    'id' => $slider->id,
                    'title' => $slider->title,
                    'subtitle' => $slider->subtitle,
                    'heading' => $slider->heading,
                    'image' => $slider->image,
                    'link' => $slider->link,
                    'price' => $slider->price,
                    'price_em' => $slider->price_em,
                    'button_text' => $slider->button_text,
                    'button_url' => $slider->button_url,
                    'background_color' => $slider->background_color,
                    'animation_name' => $slider->animation_name,
                    'text_uppercase' => $slider->text_uppercase,
                ])
                ->toArray(),

            // Banners
            'banners' => Banner::active()
                ->byPosition('home')
                ->ordered()
                ->get()
                ->map(fn($banner) => [
                    'id' => $banner->id,
                    'title' => $banner->title,
                    'subtitle' => $banner->subtitle,
                    'image' => $banner->image,
                    'image_alt' => $banner->image_alt,
                    'link' => $banner->link,
                    'price' => $banner->price,
                    'price_em' => $banner->price_em,
                    'button_text' => $banner->button_text,
                    'button_url' => $banner->button_url,
                    'background_color' => $banner->background_color,
                    'text_align' => $banner->text_align,
                    'animation_name' => $banner->animation_name,
                    'animation_delay' => $banner->animation_delay,
                ])
                ->toArray(),

            // Info Boxes
            'infoBoxes' => InfoBox::active()
                ->byLocation('home')
                ->ordered()
                ->get()
                ->map(fn($infoBox) => [
                    'id' => $infoBox->id,
                    'icon' => $infoBox->icon,
                    'title' => $infoBox->title,
                    'description' => $infoBox->description,
                ])
                ->toArray(),

            // Feature Boxes
            'featureBoxes' => FeatureBox::active()
                ->byLocation('home')
                ->ordered()
                ->get()
                ->map(fn($featureBox) => [
                    'id' => $featureBox->id,
                    'icon' => $featureBox->icon,
                    'title' => $featureBox->title,
                    'subtitle' => $featureBox->subtitle,
                    'description' => $featureBox->description,
                    'animation_name' => $featureBox->animation_name,
                    'animation_delay' => $featureBox->animation_delay,
                ])
                ->toArray(),

            // Brands
            'brands' => Brand::active()
                ->ordered()
                ->limit(6)
                ->get()
                ->map(fn($brand) => [
                    'id' => $brand->id,
                    'name' => $brand->name,
                    'logo' => $brand->logo,
                ])
                ->toArray(),

            // Featured Products
            'featuredProducts' => Product::published()
                ->featured()
                ->limit(8)
                ->get()
                ->map(fn($product) => $this->formatProductForView($product))
                ->toArray(),

            // Top Rated Products
            'topRatedProducts' => Product::published()
                ->topRated()
                ->limit(3)
                ->get()
                ->map(fn($product) => $this->formatProductForView($product))
                ->toArray(),

            // Best Selling Products
            'bestSellingProducts' => Product::published()
                ->bestSelling()
                ->limit(3)
                ->get()
                ->map(fn($product) => $this->formatProductForView($product))
                ->toArray(),

            // Latest Products
            'latestProducts' => Product::published()
                ->latest()
                ->limit(3)
                ->get()
                ->map(fn($product) => $this->formatProductForView($product))
                ->toArray(),

            // Blog Posts
            'blogPosts' => Blog::where('status', 'published')
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get()
                ->map(fn($post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'featured_image' => $post->featured_image,
                    'published_at' => $post->published_at,
                    'day' => $post->published_at ? $post->published_at->format('d') : null,
                    'month' => $post->published_at ? $post->published_at->format('M') : null,
                ])
                ->toArray(),

            // Categories (ViewComposer'dan geliyor ama burada da sağlıyoruz)
            'categories' => category_tree(),
            'chunkedCategories' => category_tree_chunked(2),
        ];
    }

    /**
     * Ürünü view için formatlar
     */
    private function formatProductForView(Product $product): array
    {
        $product->load(['media', 'variations', 'categories']);

        $primaryImage = $product->media->first();
        $secondaryImage = $product->media->skip(1)->first();

        // En düşük fiyatlı varyasyonu bul veya varsayılan fiyat
        $minPrice = $product->variations->min('price') ?? 0;
        $formattedPrice = '$' . number_format($minPrice, 2);

        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'sku' => $product->sku,
            'price' => $formattedPrice,
            'image' => $primaryImage ? $primaryImage->path : '/porto/assets/images/products/product-1.jpg',
            'image_hover' => $secondaryImage ? $secondaryImage->path : null,
            'url' => "/product.html?product={$product->slug}",
            'category' => $product->categories->first()?->name,
            'category_url' => $product->categories->first() ? "/shop.html?category={$product->categories->first()->slug}" : null,
        ];
    }

    /**
     * About sayfası için verileri getirir
     */
    private function getAboutData(): array
    {
        $getSetting = fn(string $key) => $this->storeSettingService->get($key);
        $getJsonSetting = function (string $key) use ($getSetting) {
            $value = $getSetting($key);
            if (empty($value) || $value === null) {
                return [];
            }
            $decoded = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [];
            }
            return is_array($decoded) ? $decoded : [];
        };

        return [
            // Page Header
            'pageTitle' => $getSetting('about_page_title'),
            'pageSubtitle' => $getSetting('about_page_subtitle'),
            'pageBackground' => $getSetting('about_page_background'),

            // About Story
            'aboutStory' => $getSetting('about_story'),
            'aboutQuote' => $getSetting('about_quote'),

            // Feature Boxes (Why Choose Us)
            'featureBoxes' => FeatureBox::active()
                ->byLocation('about')
                ->ordered()
                ->get()
                ->map(fn($featureBox) => [
                    'id' => $featureBox->id,
                    'icon' => $featureBox->icon,
                    'title' => $featureBox->title,
                    'subtitle' => $featureBox->subtitle,
                    'description' => $featureBox->description,
                ])
                ->toArray(),

            // Testimonials
            'testimonials' => $getJsonSetting('about_testimonials'),

            // Counters
            'counters' => $getJsonSetting('about_counters'),
        ];
    }

    /**
     * Contact sayfası için verileri getirir
     */
    private function getContactData(): array
    {
        $getSetting = fn(string $key) => $this->storeSettingService->get($key);

        return [
            // Contact Info
            'contactDescription' => $getSetting('contact_info_description'),

            // Feature Boxes (Contact Info - Address, Phone, Email, Working Hours)
            'contactInfoBoxes' => FeatureBox::active()
                ->byLocation('contact')
                ->ordered()
                ->get()
                ->map(fn($featureBox) => [
                    'id' => $featureBox->id,
                    'icon' => $featureBox->icon,
                    'title' => $featureBox->title,
                    'subtitle' => $featureBox->subtitle,
                    'description' => $featureBox->description,
                ])
                ->toArray(),

            // FAQs
            'faqs' => Faq::where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn($faq) => [
                    'id' => $faq->id,
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                ])
                ->toArray(),
        ];
    }

    /**
     * Blog listeleme sayfası için verileri getirir
     */
    private function getBlogPageData(): array
    {
        $posts = Blog::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        return [
            'blogPosts' => $posts,
            'recentPosts' => Blog::query()
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->orderByDesc('published_at')
                ->limit(3)
                ->get(),
            'blogCategories' => category_tree(),
            'blogTags' => Tag::active()->orderBy('name')->limit(10)->get(),
        ];
    }

    /**
     * Blog tekil sayfası için verileri getirir
     */
    private function getBlogSingleData(): array
    {
        $slug = request()->query('post');

        $post = Blog::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->when($slug, fn($query) => $query->where('slug', $slug))
            ->orderByDesc('published_at')
            ->first();

        if (!$post) {
            return [
                'blogPost' => null,
                'relatedPosts' => collect(),
                'recentPosts' => collect(),
                'blogCategories' => category_tree(),
                'blogTags' => Tag::active()->orderBy('name')->limit(10)->get(),
            ];
        }

        return [
            'blogPost' => $post,
            'relatedPosts' => Blog::query()
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('id', '!=', $post->id)
                ->orderByDesc('published_at')
                ->limit(3)
                ->get(),
            'recentPosts' => Blog::query()
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('id', '!=', $post->id)
                ->orderByDesc('published_at')
                ->limit(2)
                ->get(),
            'blogCategories' => category_tree(),
            'blogTags' => Tag::active()->orderBy('name')->limit(10)->get(),
        ];
    }

    /**
     * Shop sayfası verileri
     */
    private function getShopData(): array
    {
        $products = Product::published()
            ->with(['media', 'categories'])
            ->ordered()
            ->paginate(12)
            ->withQueryString();

        // Category banners
        $categoryBanners = Banner::where('status', 'active')
            ->where('location', 'category')
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return [
            'shopProducts' => $products,
            'shopCategories' => category_tree(),
            'categoryBanners' => $categoryBanners,
            'featuredProducts' => Product::published()
                ->featured()
                ->with(['media', 'categories'])
                ->limit(3)
                ->get()
                ->map(fn($product) => $this->formatProductForView($product))
                ->toArray(),
            'shopFilters' => $this->getShopFilters(),
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'colors' => [
                ['label' => 'Black', 'value' => '#000000'],
                ['label' => 'Blue', 'value' => '#0188cc'],
                ['label' => 'Green', 'value' => '#81d742'],
                ['label' => 'Gray', 'value' => '#6085a5'],
                ['label' => 'Brown', 'value' => '#ab6e6e'],
            ],
        ];
    }

    /**
     * Ürün detay sayfası verileri
     */
    private function getProductDetailData(): array
    {
        $slug = request()->query('product');
        $product = Product::published()
            ->with(['media', 'categories', 'tags', 'variations'])
            ->when($slug, fn($query) => $query->where('slug', $slug))
            ->first();

        if (!$product) {
            return [
                'product' => null,
                'relatedProducts' => [],
            ];
        }

        $minPrice = $product->variations->min('price') ?? 0;
        $maxPrice = $product->variations->max('price');

        return [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'sku' => $product->sku,
                'description' => $product->description,
                'short_description' => $product->short_description,
                'price' => $this->formatPrice($minPrice),
                'old_price' => ($maxPrice && $maxPrice > $minPrice) ? $this->formatPrice($maxPrice) : null,
                'rating' => $product->rating ?? 0,
                'images' => $product->media->map(fn($media) => [
                    'full' => $media->path,
                    'thumb' => $media->thumbnail_path ?? $media->path,
                ]),
                'categories' => $product->categories->map(fn($category) => [
                    'name' => $category->name,
                    'slug' => $category->slug,
                ]),
                'tags' => $product->tags->map(fn($tag) => [
                    'name' => $tag->name,
                    'slug' => $tag->slug,
                ]),
            ],
            'relatedProducts' => Product::published()
                ->where('id', '!=', $product->id)
                ->with(['media', 'categories'])
                ->limit(10)
                ->get()
                ->map(fn($related) => $this->formatProductForView($related))
                ->toArray(),
            'featuredProducts' => Product::published()
                ->featured()
                ->where('id', '!=', $product->id)
                ->with(['media', 'categories'])
                ->limit(3)
                ->get()
                ->map(fn($p) => $this->formatProductForView($p))
                ->toArray(),
            'bestSellingProducts' => Product::published()
                ->bestSelling()
                ->where('id', '!=', $product->id)
                ->with(['media', 'categories'])
                ->limit(3)
                ->get()
                ->map(fn($p) => $this->formatProductForView($p))
                ->toArray(),
            'latestProducts' => Product::published()
                ->latest()
                ->where('id', '!=', $product->id)
                ->with(['media', 'categories'])
                ->limit(3)
                ->get()
                ->map(fn($p) => $this->formatProductForView($p))
                ->toArray(),
            'topRatedProducts' => Product::published()
                ->topRated()
                ->where('id', '!=', $product->id)
                ->with(['media', 'categories'])
                ->limit(3)
                ->get()
                ->map(fn($p) => $this->formatProductForView($p))
                ->toArray(),
        ];
    }

    /**
     * Sepet sayfası verileri
     */
    /**
     * Sepet sayfası verileri
     */
    private function getCartData(): array
    {
        $cart = \Illuminate\Support\Facades\Session::get('cart', ['items' => [], 'total' => 0]);
        $items = array_values($cart['items']);
        $subtotal = $cart['total'];

        // DB'den aktif shipping method'ları çek
        $shippingMethods = ShippingMethod::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $shippingOptions = $shippingMethods->map(function ($method) {
            return [
                'value' => $method->code,
                'label' => $method->name,
                'price' => (float) $method->cost,
                'formatted_price' => $this->formatPrice((float) $method->cost),
            ];
        })->toArray();

        // Eğer shipping method yoksa varsayılan değer
        if (empty($shippingOptions)) {
            $shippingOptions = [
                ['value' => 'free', 'label' => 'Free Shipping', 'price' => 0, 'formatted_price' => $this->formatPrice(0)],
            ];
        }

        $total = $subtotal + ($shippingOptions[0]['price'] ?? 0);

        return [
            'cartItems' => $items,
            'cartTotals' => [
                'subtotal' => $subtotal,
                'formattedSubtotal' => $this->formatPrice($subtotal),
                'total' => $total,
                'formattedTotal' => $this->formatPrice($total),
            ],
            'shippingOptions' => $shippingOptions,
        ];
    }

    /**
     * Checkout sayfası verileri
     */
    private function getCheckoutData(): array
    {
        $cartData = $this->getCartData();

        // DB'den ülkeleri ve eyaletleri çek
        $countries = Country::active()
            ->ordered()
            ->get(['id', 'name', 'code', 'iso_code']);

        $states = State::active()
            ->ordered()
            ->get(['id', 'country_id', 'name', 'code']);

        // Kullanıcı adreslerini çek
        $userAddresses = [];
        if (Auth::check()) {
            $userAddresses = Address::where('user_id', Auth::id())
                ->orderBy('is_default', 'desc')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(fn($address) => [
                    'id' => $address->id,
                    'title' => $address->title,
                    'first_name' => $address->first_name,
                    'last_name' => $address->last_name,
                    'company' => $address->company,
                    'address_line_1' => $address->address_line_1,
                    'address_line_2' => $address->address_line_2,
                    'city' => $address->city,
                    'state' => $address->state,
                    'postal_code' => $address->postal_code,
                    'country' => $address->country,
                    'phone' => $address->phone,
                    'type' => $address->type,
                    'is_default' => $address->is_default,
                ])->toArray();
        }

        return [
            'checkoutCart' => $cartData,
            'billingCountries' => $countries->map(fn($country) => [
                'id' => $country->id,
                'name' => $country->name,
                'code' => $country->code,
                'iso_code' => $country->iso_code,
            ])->toArray(),
            'states' => $states->map(fn($state) => [
                'id' => $state->id,
                'country_id' => $state->country_id,
                'name' => $state->name,
                'code' => $state->code,
            ])->toArray(),
            'userAddresses' => $userAddresses,
        ];
    }

    /**
     * Wishlist sayfası verileri
     */
    private function getWishlistData(): array
    {
        $wishlistItems = [];

        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', Auth::id())
                ->with(['product' => function ($query) {
                    $query->with(['media']);
                }])
                ->get()
                ->map(function ($wishlist) {
                    $product = $wishlist->product;
                    if (!$product) {
                        return null;
                    }

                    return [
                        'id' => $wishlist->id,
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'sku' => $product->sku,
                        'price' => $product->price,
                        'formatted_price' => $this->formatPrice($product->price),
                        'image' => $product->media->first()?->path ?? '/assets/images/products/product-1.jpg',
                        'url' => route('page', ['page' => 'product', 'product' => $product->slug]),
                    ];
                })
                ->filter()
                ->values()
                ->toArray();
        }

        return [
            'wishlistItems' => $wishlistItems,
        ];
    }

    /**
     * Dashboard sayfası verileri
     */
    private function getDashboardData(): array
    {
        $user = Auth::user();

        // Gerçek siparişleri çek
        $orders = collect();
        if ($user) {
            $orders = Order::where('user_id', $user->id)
                ->with(['items.product.media'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
                ->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'order_number' => $order->order_number,
                        'status' => $order->status,
                        'total' => $this->formatPrice($order->total),
                        'formatted_total' => $this->formatPrice($order->total),
                        'date' => $order->created_at->format('M d, Y'),
                        'items_count' => $order->items->count(),
                    ];
                });
        }

        // Kullanıcı adreslerini çek
        $addresses = [
            'billing' => null,
            'shipping' => null,
        ];

        if ($user) {
            $billingAddress = Address::where('user_id', $user->id)
                ->where('type', 'billing')
                ->where('is_default', true)
                ->first();

            $shippingAddress = Address::where('user_id', $user->id)
                ->where('type', 'shipping')
                ->where('is_default', true)
                ->first();

            if ($billingAddress) {
                $addresses['billing'] = [
                    'name' => $billingAddress->first_name . ' ' . $billingAddress->last_name,
                    'email' => $user->email,
                    'address' => $billingAddress->address_line_1,
                    'city' => $billingAddress->city,
                    'state' => $billingAddress->state,
                    'postal_code' => $billingAddress->postal_code,
                    'country' => $billingAddress->country,
                ];
            } else {
                $addresses['billing'] = [
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            }

            if ($shippingAddress) {
                $addresses['shipping'] = [
                    'name' => $shippingAddress->first_name . ' ' . $shippingAddress->last_name,
                    'address' => $shippingAddress->address_line_1,
                    'city' => $shippingAddress->city,
                    'state' => $shippingAddress->state,
                    'postal_code' => $shippingAddress->postal_code,
                    'country' => $shippingAddress->country,
                ];
            }
        }

        return [
            'accountUser' => $user,
            'accountOrders' => $orders,
            'accountDownloads' => collect(),
            'accountAddresses' => $addresses,
        ];
    }


    /**
     * Shop filtrelerini DB'den çeker
     */
    private function getShopFilters(): array
    {
        // Filterable attribute'ları çek
        $filterableAttributes = Attribute::filterable()
            ->with(['values' => function ($query) {
                $query->ordered();
            }])
            ->active()
            ->get();

        $filters = [];

        foreach ($filterableAttributes as $attribute) {
            $values = $attribute->values->map(function ($value) {
                $item = [
                    'label' => $value->value,
                    'value' => $value->slug ?? $value->value,
                ];

                // Eğer color attribute'u ise color field'ını ekle
                if ($value->color) {
                    $item['color'] = $value->color;
                }

                // Eğer image varsa ekle
                if ($value->image) {
                    $item['image'] = $value->image;
                }

                return $item;
            })->toArray();

            $filters[$attribute->name] = $values;
        }

        // Markaları ekle
        $brands = Brand::active()
            ->ordered()
            ->get(['id', 'name', 'slug'])
            ->map(fn($brand) => [
                'label' => $brand->name,
                'value' => $brand->slug,
            ])
            ->toArray();

        if (!empty($brands)) {
            $filters['Brands'] = $brands;
        }

        return $filters;
    }

    /**
     * Fiyat formatlar
     */
    private function formatPrice(float $amount): string
    {
        return '$' . number_format($amount, 2);
    }
}
