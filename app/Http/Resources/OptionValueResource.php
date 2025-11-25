<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OptionValueResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'option' => [
                'id' => $this->option->id,
                'name' => $this->option->name,
            ],
        ];
    }
}
