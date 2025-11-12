<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // About Us
            'footer_about_logo' => ['nullable', 'string', 'max:500'],
            'footer_about_description' => ['nullable', 'string', 'max:1000'],
            'footer_about_read_more_url' => ['nullable', 'string', 'max:500'],

            // Contact Info
            'footer_contact_address' => ['nullable', 'string', 'max:500'],
            'footer_contact_phone' => ['nullable', 'string', 'max:100'],
            'footer_contact_email' => ['nullable', 'email', 'max:255'],
            'footer_contact_working_hours' => ['nullable', 'string', 'max:200'],

            // Social Media
            'footer_social_facebook' => ['nullable', 'string', 'max:500'],
            'footer_social_twitter' => ['nullable', 'string', 'max:500'],
            'footer_social_linkedin' => ['nullable', 'string', 'max:500'],

            // Customer Service Links
            'footer_customer_service_links' => ['nullable', 'array'],
            'footer_customer_service_links.*.label' => ['required', 'string', 'max:255'],
            'footer_customer_service_links.*.url' => ['required', 'string', 'max:500'],

            // Popular Tags
            'footer_popular_tags' => ['nullable', 'array'],
            'footer_popular_tags.*' => ['string', 'max:100'],

            // Copyright
            'footer_copyright' => ['nullable', 'string', 'max:500'],

            // Payment Icons
            'footer_payment_icons' => ['nullable', 'array'],
            'footer_payment_icons.*.name' => ['required', 'string', 'max:100'],
            'footer_payment_icons.*.enabled' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'footer_contact_email.email' => 'E-posta adresi geçerli bir format olmalıdır.',
            'footer_customer_service_links.*.label.required' => 'Link etiketi gereklidir.',
            'footer_customer_service_links.*.url.required' => 'Link URL\'si gereklidir.',
            'footer_payment_icons.*.name.required' => 'Ödeme yöntemi adı gereklidir.',
        ];
    }
}
