<?php

use App\Models\FeatureBox;
use App\Models\StoreSetting;
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
        // Önce mevcut verileri temizle (tekrar çalıştırılabilir olması için)
        StoreSetting::whereIn('key', [
            'about_page_title',
            'about_page_subtitle',
            'about_page_background',
            'about_story',
            'about_quote',
            'about_testimonials',
            'about_counters',
        ])->delete();

        FeatureBox::where('location', 'about')->delete();

        // Page Header Settings
        StoreSetting::create([
            'key' => 'about_page_title',
            'value' => 'ABOUT US',
            'group' => 'about',
        ]);

        StoreSetting::create([
            'key' => 'about_page_subtitle',
            'value' => 'OUR COMPANY',
            'group' => 'about',
        ]);

        StoreSetting::create([
            'key' => 'about_page_background',
            'value' => '/porto/assets/images/page-header-bg.jpg',
            'group' => 'about',
        ]);

        // About Story
        StoreSetting::create([
            'key' => 'about_story',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'group' => 'about',
        ]);

        StoreSetting::create([
            'key' => 'about_quote',
            'value' => 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model search for evolved over sometimes by accident, sometimes on purpose',
            'group' => 'about',
        ]);

        // Feature Boxes (Why Choose Us)
        FeatureBox::create([
            'icon' => 'icon-shipped',
            'title' => 'Free Shipping',
            'subtitle' => null,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr.',
            'location' => 'about',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        FeatureBox::create([
            'icon' => 'icon-us-dollar',
            'title' => '100% Money Back Guarantee',
            'subtitle' => null,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr.',
            'location' => 'about',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        FeatureBox::create([
            'icon' => 'icon-online-support',
            'title' => 'Online Support 24/7',
            'subtitle' => null,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr.',
            'location' => 'about',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Testimonials
        StoreSetting::create([
            'key' => 'about_testimonials',
            'value' => json_encode([
                [
                    'name' => 'John Smith',
                    'position' => 'SMARTWAVE CEO',
                    'image' => '/porto/assets/images/clients/client1.png',
                    'message' => 'Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum dolor sit amet, consectetur elitad adipiscing cas non placerat mi.',
                ],
                [
                    'name' => 'Bob Smith',
                    'position' => 'SMARTWAVE CEO',
                    'image' => '/porto/assets/images/clients/client2.png',
                    'message' => 'Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum dolor sit amet, consectetur elitad adipiscing cas non placerat mi.',
                ],
                [
                    'name' => 'John Smith',
                    'position' => 'SMARTWAVE CEO',
                    'image' => '/porto/assets/images/clients/client1.png',
                    'message' => 'Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum dolor sit amet, consectetur elitad adipiscing cas non placerat mi.',
                ],
            ]),
            'group' => 'about',
        ]);

        // Counters
        StoreSetting::create([
            'key' => 'about_counters',
            'value' => json_encode([
                [
                    'value' => 200,
                    'suffix' => '+',
                    'title' => 'MILLION CUSTOMERS',
                ],
                [
                    'value' => 1800,
                    'suffix' => '+',
                    'title' => 'TEAM MEMBERS',
                ],
                [
                    'value' => 24,
                    'suffix' => 'HR',
                    'title' => 'SUPPORT AVAILABLE',
                ],
                [
                    'value' => 265,
                    'suffix' => '+',
                    'title' => 'SUPPORT AVAILABLE',
                ],
                [
                    'value' => 99,
                    'suffix' => '%',
                    'title' => 'SUPPORT AVAILABLE',
                ],
            ]),
            'group' => 'about',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        StoreSetting::whereIn('key', [
            'about_page_title',
            'about_page_subtitle',
            'about_page_background',
            'about_story',
            'about_quote',
            'about_testimonials',
            'about_counters',
        ])->delete();

        FeatureBox::where('location', 'about')->delete();
    }
};
