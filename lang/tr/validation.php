<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute alanı kabul edilmelidir.',
    'accepted_if' => ':other alanı :value olduğunda :attribute alanı kabul edilmelidir.',
    'active_url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'after' => ':attribute alanı :date tarihinden sonra olmalıdır.',
    'after_or_equal' => ':attribute alanı :date tarihinden sonra veya eşit olmalıdır.',
    'alpha' => ':attribute alanı sadece harf içermelidir.',
    'alpha_dash' => ':attribute alanı sadece harf, rakam, tire ve alt çizgi içerebilir.',
    'alpha_num' => ':attribute alanı sadece harf ve rakam içermelidir.',
    'any_of' => ':attribute alanı geçersizdir.',
    'array' => ':attribute alanı bir dizi olmalıdır.',
    'ascii' => ':attribute alanı sadece tek baytlı alfanumerik karakterler ve semboller içermelidir.',
    'before' => ':attribute alanı :date tarihinden önce olmalıdır.',
    'before_or_equal' => ':attribute alanı :date tarihinden önce veya eşit olmalıdır.',
    'between' => [
        'array' => ':attribute alanı :min ile :max arasında öğe içermelidir.',
        'file' => ':attribute alanı :min ile :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute alanı :min ile :max arasında olmalıdır.',
        'string' => ':attribute alanı :min ile :max karakter arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru veya yanlış olmalıdır.',
    'can' => ':attribute alanı yetkisiz bir değer içeriyor.',
    'confirmed' => ':attribute alanı onayı eşleşmiyor.',
    'contains' => ':attribute alanı gerekli bir değer eksik.',
    'current_password' => 'Şifre yanlış.',
    'date' => ':attribute alanı geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute alanı :date tarihine eşit olmalıdır.',
    'date_format' => ':attribute alanı :format formatına uymalıdır.',
    'decimal' => ':attribute alanı :decimal ondalık basamak içermelidir.',
    'declined' => ':attribute alanı reddedilmelidir.',
    'declined_if' => ':other alanı :value olduğunda :attribute alanı reddedilmelidir.',
    'different' => ':attribute alanı ve :other farklı olmalıdır.',
    'digits' => ':attribute alanı :digits haneli olmalıdır.',
    'digits_between' => ':attribute alanı :min ile :max haneli olmalıdır.',
    'dimensions' => ':attribute alanı geçersiz görsel boyutlarına sahip.',
    'distinct' => ':attribute alanı tekrarlanan bir değere sahip.',
    'doesnt_contain' => ':attribute alanı şunlardan herhangi birini içermemelidir: :values.',
    'doesnt_end_with' => ':attribute alanı şunlardan biriyle bitmemelidir: :values.',
    'doesnt_start_with' => ':attribute alanı şunlardan biriyle başlamamalıdır: :values.',
    'email' => ':attribute alanı geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute alanı şunlardan biriyle bitmelidir: :values.',
    'enum' => 'Seçilen :attribute geçersizdir.',
    'exists' => 'Seçilen :attribute geçersizdir.',
    'extensions' => ':attribute alanı şu uzantılardan birine sahip olmalıdır: :values.',
    'file' => ':attribute alanı bir dosya olmalıdır.',
    'filled' => ':attribute alanı bir değere sahip olmalıdır.',
    'gt' => [
        'array' => ':attribute alanı :value öğeden fazla içermelidir.',
        'file' => ':attribute alanı :value kilobayttan büyük olmalıdır.',
        'numeric' => ':attribute alanı :value değerinden büyük olmalıdır.',
        'string' => ':attribute alanı :value karakterden fazla olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute alanı :value veya daha fazla öğe içermelidir.',
        'file' => ':attribute alanı :value kilobayta eşit veya daha büyük olmalıdır.',
        'numeric' => ':attribute alanı :value değerine eşit veya daha büyük olmalıdır.',
        'string' => ':attribute alanı :value karaktere eşit veya daha fazla olmalıdır.',
    ],
    'hex_color' => ':attribute alanı geçerli bir onaltılık renk olmalıdır.',
    'image' => ':attribute alanı bir görsel olmalıdır.',
    'in' => 'Seçilen :attribute geçersizdir.',
    'in_array' => ':attribute alanı :other içinde bulunmalıdır.',
    'in_array_keys' => ':attribute alanı şu anahtarlardan en az birini içermelidir: :values.',
    'integer' => ':attribute alanı bir tam sayı olmalıdır.',
    'ip' => ':attribute alanı geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute alanı geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute alanı geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute alanı geçerli bir JSON dizisi olmalıdır.',
    'list' => ':attribute alanı bir liste olmalıdır.',
    'lowercase' => ':attribute alanı küçük harf olmalıdır.',
    'lt' => [
        'array' => ':attribute alanı :value öğeden az içermelidir.',
        'file' => ':attribute alanı :value kilobayttan küçük olmalıdır.',
        'numeric' => ':attribute alanı :value değerinden küçük olmalıdır.',
        'string' => ':attribute alanı :value karakterden az olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute alanı :value öğeden fazla içermemelidir.',
        'file' => ':attribute alanı :value kilobayta eşit veya daha küçük olmalıdır.',
        'numeric' => ':attribute alanı :value değerine eşit veya daha küçük olmalıdır.',
        'string' => ':attribute alanı :value karaktere eşit veya daha az olmalıdır.',
    ],
    'mac_address' => ':attribute alanı geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'array' => ':attribute alanı :max öğeden fazla içermemelidir.',
        'file' => ':attribute alanı :max kilobayttan büyük olmamalıdır.',
        'numeric' => ':attribute alanı :max değerinden büyük olmamalıdır.',
        'string' => ':attribute alanı :max karakterden fazla olmamalıdır.',
    ],
    'max_digits' => ':attribute alanı :max haneden fazla olmamalıdır.',
    'mimes' => ':attribute alanı şu türde bir dosya olmalıdır: :values.',
    'mimetypes' => ':attribute alanı şu türde bir dosya olmalıdır: :values.',
    'min' => [
        'array' => ':attribute alanı en az :min öğe içermelidir.',
        'file' => ':attribute alanı en az :min kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en az :min olmalıdır.',
        'string' => ':attribute alanı en az :min karakter olmalıdır.',
    ],
    'min_digits' => ':attribute alanı en az :min haneli olmalıdır.',
    'missing' => ':attribute alanı bulunmamalıdır.',
    'missing_if' => ':other alanı :value olduğunda :attribute alanı bulunmamalıdır.',
    'missing_unless' => ':other alanı :value olmadığı sürece :attribute alanı bulunmamalıdır.',
    'missing_with' => ':values mevcut olduğunda :attribute alanı bulunmamalıdır.',
    'missing_with_all' => ':values mevcut olduğunda :attribute alanı bulunmamalıdır.',
    'multiple_of' => ':attribute alanı :value değerinin katı olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersizdir.',
    'not_regex' => ':attribute alanı formatı geçersizdir.',
    'numeric' => ':attribute alanı bir sayı olmalıdır.',
    'password' => [
        'letters' => ':attribute alanı en az bir harf içermelidir.',
        'mixed' => ':attribute alanı en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers' => ':attribute alanı en az bir rakam içermelidir.',
        'symbols' => ':attribute alanı en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında görünmüş. Lütfen farklı bir :attribute seçin.',
    ],
    'present' => ':attribute alanı mevcut olmalıdır.',
    'present_if' => ':other alanı :value olduğunda :attribute alanı mevcut olmalıdır.',
    'present_unless' => ':other alanı :value olmadığı sürece :attribute alanı mevcut olmalıdır.',
    'present_with' => ':values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'present_with_all' => ':values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'prohibited' => ':attribute alanı yasaklanmıştır.',
    'prohibited_if' => ':other alanı :value olduğunda :attribute alanı yasaklanmıştır.',
    'prohibited_if_accepted' => ':other alanı kabul edildiğinde :attribute alanı yasaklanmıştır.',
    'prohibited_if_declined' => ':other alanı reddedildiğinde :attribute alanı yasaklanmıştır.',
    'prohibited_unless' => ':other alanı :values içinde olmadığı sürece :attribute alanı yasaklanmıştır.',
    'prohibits' => ':attribute alanı :other alanının mevcut olmasını yasaklar.',
    'regex' => ':attribute alanı formatı geçersizdir.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı şu girişleri içermelidir: :values.',
    'required_if' => ':other alanı :value olduğunda :attribute alanı gereklidir.',
    'required_if_accepted' => ':other alanı kabul edildiğinde :attribute alanı gereklidir.',
    'required_if_declined' => ':other alanı reddedildiğinde :attribute alanı gereklidir.',
    'required_unless' => ':other alanı :values içinde olmadığı sürece :attribute alanı gereklidir.',
    'required_with' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':values hiçbiri mevcut olmadığında :attribute alanı gereklidir.',
    'same' => ':attribute alanı :other ile eşleşmelidir.',
    'size' => [
        'array' => ':attribute alanı :size öğe içermelidir.',
        'file' => ':attribute alanı :size kilobayt olmalıdır.',
        'numeric' => ':attribute alanı :size olmalıdır.',
        'string' => ':attribute alanı :size karakter olmalıdır.',
    ],
    'starts_with' => ':attribute alanı şunlardan biriyle başlamalıdır: :values.',
    'string' => ':attribute alanı bir metin olmalıdır.',
    'timezone' => ':attribute alanı geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklenemedi.',
    'uppercase' => ':attribute alanı büyük harf olmalıdır.',
    'url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'ulid' => ':attribute alanı geçerli bir ULID olmalıdır.',
    'uuid' => ':attribute alanı geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        // Genel alanlar
        'name' => 'Ad',
        'slug' => 'Slug',
        'description' => 'Açıklama',
        'short_description' => 'Kısa Açıklama',
        'email' => 'E-posta',
        'password' => 'Şifre',
        'password_confirmation' => 'Şifre Onayı',
        'is_active' => 'Aktif',
        'sort_order' => 'Sıralama',
        'image' => 'Resim',
        'logo' => 'Logo',
        'website' => 'Web Sitesi',
        'code' => 'Kod',
        'status' => 'Durum',
        'type' => 'Tip',
        'required' => 'Zorunlu',
        'color' => 'Renk',
        'rate' => 'Oran',
        'notes' => 'Notlar',

        // Product
        'sku' => 'SKU',
        'brand_id' => 'Marka',
        'tax_class_id' => 'Vergi Sınıfı',
        'is_virtual' => 'Sanal Ürün',
        'seo_url' => 'SEO URL',
        'meta_title' => 'Meta Başlık',
        'meta_description' => 'Meta Açıklama',
        'new_from' => 'Yeni Başlangıç Tarihi',
        'new_to' => 'Yeni Bitiş Tarihi',
        'categories' => 'Kategoriler',
        'categories.*' => 'Kategori',
        'tags' => 'Etiketler',
        'tags.*' => 'Etiket',
        'attributes' => 'Özellikler',
        'attributes.*.attribute_id' => 'Özellik',
        'attributes.*.value' => 'Özellik Değeri',
        'attributes.*.attribute_value_id' => 'Özellik Değeri',
        'options' => 'Seçenekler',
        'options.*.option_id' => 'Seçenek',
        'options.*.values' => 'Seçenek Değerleri',
        'options.*.values.*.label' => 'Etiket',
        'options.*.values.*.value' => 'Değer',
        'options.*.values.*.price_adjustment' => 'Fiyat Düzeltmesi',
        'options.*.values.*.price_type' => 'Fiyat Tipi',
        'options.*.values.*.sort_order' => 'Sıralama',
        'variations' => 'Varyasyonlar',
        'variations.*.variation_id' => 'Varyasyon',
        'variations.*.sort_order' => 'Sıralama',
        'variants' => 'Varyantlar',
        'variants.*.name' => 'Varyant Adı',
        'variants.*.sku' => 'Varyant SKU',
        'variants.*.barcode' => 'Barkod',
        'variants.*.price' => 'Fiyat',
        'variants.*.stock' => 'Stok',
        'variants.*.image' => 'Varyant Resmi',
        'variants.*.is_active' => 'Aktif',
        'variants.*.variation_values' => 'Varyasyon Değerleri',
        'variants.*.variation_values.*.variation_id' => 'Varyasyon',
        'variants.*.variation_values.*.variation_value_id' => 'Varyasyon Değeri',
        'media' => 'Medya',
        'media.*.file' => 'Dosya',
        'media.*.type' => 'Medya Tipi',
        'media.*.path' => 'Yol',
        'media.*.alt' => 'Alt Metin',
        'media.*.sort_order' => 'Sıralama',
        'links' => 'Bağlantılar',
        'links.*.linked_product_id' => 'Bağlı Ürün',
        'links.*.type' => 'Bağlantı Tipi',
        'downloads' => 'İndirmeler',
        'downloads.*.file' => 'Dosya',

        // Category
        'parent_id' => 'Üst Kategori',

        // Brand
        'brand_id' => 'Marka',

        // Attribute
        'attribute_set_id' => 'Özellik Seti',
        'category_ids' => 'Kategoriler',
        'category_ids.*' => 'Kategori',
        'is_filterable' => 'Filtrelenebilir',
        'values' => 'Değerler',
        'values.*.value' => 'Değer',
        'values.*.slug' => 'Slug',
        'values.*.color' => 'Renk',
        'values.*.image' => 'Resim',
        'values.*.sort_order' => 'Sıralama',
        'values.*.label' => 'Etiket',

        // Attribute Set
        'attribute_set_id' => 'Özellik Seti',

        // Product Option
        'values.*.price_adjustment' => 'Fiyat Düzeltmesi',
        'values.*.price_type' => 'Fiyat Tipi',

        // Variation Template / Variation
        'values.*.label' => 'Etiket',
        'values.*.value' => 'Değer',

        // Tag
        'color' => 'Renk',

        // Tax Class
        'rate' => 'Vergi Oranı',

        // Supplier
        'contact_person' => 'İletişim Kişisi',
        'phone' => 'Telefon',
        'address' => 'Adres',
        'city' => 'Şehir',
        'country' => 'Ülke',
        'tax_number' => 'Vergi Numarası',

        // Mannequin
        'images' => 'Resimler',
        'images.*' => 'Resim',
        'measurements' => 'Ölçüler',

        // User
        'group_ids' => 'Kullanıcı Grupları',
        'group_ids.*' => 'Kullanıcı Grubu',

        // User Group
        'permissions' => 'İzinler',
        'permissions.*' => 'İzin',
    ],

];
