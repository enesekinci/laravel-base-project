<?php

namespace App\Models\Concerns;

trait Translatable
{
    /**
     * Çevrilecek alanları getirir
     * 
     * Her model kendi $translatable property'sini tanımlamalıdır
     * 
     * @return array<string>
     */
    public function getTranslatableFields(): array
    {
        return property_exists($this, 'translatable') ? $this->translatable : [];
    }
}
