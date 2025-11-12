<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Inertia\Inertia;

class BaseFormRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // Inertia.js istekleri için özel response
        // Inertia.js tüm isteklerde X-Inertia header'ı gönderir
        if (request()->header('X-Inertia')) {
            $component = $this->getInertiaComponent();

            // Component belirlenebilirse Inertia ile render et
            if ($component) {
                // Validation hatalarını props'a ekle
                $props = array_merge($this->getInertiaProps(), [
                    'errors' => $validator->errors()->toArray(),
                ]);

                // Inertia response'unu Symfony Response'a çevir
                $inertiaResponse = Inertia::render($component, $props);
                $response = $inertiaResponse->toResponse(request());

                throw new HttpResponseException($response);
            }

            // Component belirlenemezse default davranışı kullan
            // Inertia middleware bunu yakalayacak
        }

        // Normal Laravel request'leri için default davranış
        parent::failedValidation($validator);
    }

    /**
     * Get the Inertia component name from the previous URL
     * Override this method in child classes to specify the component
     */
    protected function getInertiaComponent(): ?string
    {
        // Önceki URL'den component adını çıkar
        // Örnek: /admin/products/create -> Admin/Products/Create
        $path = parse_url(url()->previous(), PHP_URL_PATH);

        // Route'dan component adını çıkar
        // Bu basit bir yaklaşım, daha gelişmiş bir çözüm için route helper kullanılabilir
        if (str_contains($path, '/admin/products/create')) {
            return 'Admin/Products/Create';
        }

        if (str_contains($path, '/admin/products/') && preg_match('/\/admin\/products\/(\d+)\/edit/', $path, $matches)) {
            return 'Admin/Products/Edit';
        }

        // Component belirlenemezse null döndür ve default davranışı kullan
        return null;
    }

    /**
     * Get the props for the Inertia component
     */
    protected function getInertiaProps(): array
    {
        // Bu metod override edilebilir
        return [];
    }
}
