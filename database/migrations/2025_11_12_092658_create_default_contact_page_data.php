<?php

use App\Models\Faq;
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
        StoreSetting::where('key', 'contact_info_description')->delete();
        FeatureBox::where('location', 'contact')->delete();
        
        // Sadece bu migration'da eklediğimiz FAQ sorularını sil
        $faqQuestions = [
            'Curabitur eget leo at velit imperdiet viaculis vitaes?',
            'Curabitur eget leo at velit imperdiet vague iaculis vitaes?',
            'Curabitur eget leo at velit imperdiet varius iaculis vitaes?',
        ];
        Faq::whereIn('question', $faqQuestions)->delete();

        // Contact Description
        StoreSetting::create([
            'key' => 'contact_info_description',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Vestibulum auctor felis eget orci semper vestibulum. Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'group' => 'contact',
        ]);

        // Feature Boxes (Contact Info - Address, Phone, Email, Working Hours)
        FeatureBox::create([
            'icon' => 'sicon-location-pin',
            'title' => 'Address',
            'subtitle' => '123 Wall Street, New York / NY',
            'description' => null,
            'location' => 'contact',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        FeatureBox::create([
            'icon' => 'fa fa-mobile-alt',
            'title' => 'Phone Number',
            'subtitle' => '(800) 123-4567',
            'description' => null,
            'location' => 'contact',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        FeatureBox::create([
            'icon' => 'far fa-envelope',
            'title' => 'E-mail Address',
            'subtitle' => 'porto@portotheme.com',
            'description' => null,
            'location' => 'contact',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        FeatureBox::create([
            'icon' => 'far fa-calendar-alt',
            'title' => 'Working Days/Hours',
            'subtitle' => 'Mon - Sun / 9:00AM - 8:00PM',
            'description' => null,
            'location' => 'contact',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // FAQs
        Faq::create([
            'question' => 'Curabitur eget leo at velit imperdiet viaculis vitaes?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Curabitur eget leo at velit imperdiet vague iaculis vitaes?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Curabitur eget leo at velit imperdiet viaculis vitaes?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Curabitur eget leo at velit imperdiet vague iaculis vitaes?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Curabitur eget leo at velit imperdiet varius iaculis vitaes?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.',
            'sort_order' => 5,
            'is_active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        StoreSetting::where('key', 'contact_info_description')->delete();
        FeatureBox::where('location', 'contact')->delete();
        
        // Sadece bu migration'da eklediğimiz FAQ sorularını sil
        $faqQuestions = [
            'Curabitur eget leo at velit imperdiet viaculis vitaes?',
            'Curabitur eget leo at velit imperdiet vague iaculis vitaes?',
            'Curabitur eget leo at velit imperdiet varius iaculis vitaes?',
        ];
        Faq::whereIn('question', $faqQuestions)->delete();
    }
};
