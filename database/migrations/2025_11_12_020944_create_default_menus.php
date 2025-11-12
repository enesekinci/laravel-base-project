<?php

use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Sidebar Menü
        Menu::updateOrCreate(
            ['location' => 'sidebar'],
            [
                'name' => 'Sidebar Menü',
                'location' => 'sidebar',
                'is_active' => true,
                'items' => [
                    [
                        'name' => 'Home',
                        'url' => '/porto/demo1.html',
                        'icon' => 'icon-home',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Categories',
                        'url' => '/porto/demo1-shop.html',
                        'icon' => 'sicon-badge',
                        'menu_type' => 'categories',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Products',
                        'url' => '/porto/demo1-shop.html',
                        'icon' => 'sicon-basket',
                        'is_active' => true,
                        'target' => '_self',
                        'children' => [
                            [
                                'name' => 'SIMPLE PRODUCT',
                                'url' => '/porto/demo1-product.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'VARIABLE PRODUCT',
                                'url' => '/porto/demo1-product.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'SALE PRODUCT',
                                'url' => '/porto/demo1-product.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'FEATURED PRODUCT',
                                'url' => '/porto/demo1-product.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'BUNDLE PRODUCT',
                                'url' => '/porto/demo1-product.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Pages',
                        'url' => '#',
                        'icon' => 'icon-documents',
                        'is_active' => true,
                        'target' => '_self',
                        'children' => [
                            [
                                'name' => 'About Us',
                                'url' => '/porto/demo1-about.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'Contact',
                                'url' => '/porto/demo1-contact.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'Login',
                                'url' => '/porto/login.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                            [
                                'name' => 'Forgot Password',
                                'url' => '/porto/forgot-password.html',
                                'is_active' => true,
                                'target' => '_self',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Blog',
                        'url' => '/porto/blog.html',
                        'icon' => 'icon-book-open',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'My Account',
                        'url' => '/porto/dashboard.html',
                        'icon' => 'icon-user-2',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                ],
            ]
        );

        // Header Menü (Üst Linkler)
        Menu::updateOrCreate(
            ['location' => 'header'],
            [
                'name' => 'Header Menü',
                'location' => 'header',
                'is_active' => true,
                'items' => [
                    [
                        'name' => 'My Account',
                        'url' => '/porto/dashboard.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Contact Us',
                        'url' => '/porto/demo1-contact.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'My Wishlist',
                        'url' => '/porto/wishlist.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Site Map',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Cart',
                        'url' => '/porto/cart.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Log In',
                        'url' => '/porto/login.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                ],
            ]
        );

        // Footer Menü (Customer Service Links)
        Menu::updateOrCreate(
            ['location' => 'footer'],
            [
                'name' => 'Footer Menü',
                'location' => 'footer',
                'is_active' => true,
                'items' => [
                    [
                        'name' => 'Help & FAQs',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Order Tracking',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Shipping & Delivery',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Orders History',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Advanced Search',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'My Account',
                        'url' => '/porto/dashboard.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Careers',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'About Us',
                        'url' => '/porto/demo1-about.html',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Corporate Sales',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                    [
                        'name' => 'Privacy',
                        'url' => '#',
                        'is_active' => true,
                        'target' => '_self',
                    ],
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Migration rollback edildiğinde menüleri silme (opsiyonel)
        // Menu::whereIn('location', ['sidebar', 'header', 'footer'])->delete();
    }
};
