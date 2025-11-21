<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminCouponResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'code'                  => $this->code,
            'type'                  => $this->type,
            'value'                 => (float) $this->value,
            'min_cart_total'        => (float) $this->min_cart_total,
            'usage_limit'           => $this->usage_limit,
            'usage_limit_per_user'  => $this->usage_limit_per_user,
            'used_count'            => $this->used_count,
            'is_active'             => (bool) $this->is_active,
            'starts_at'             => optional($this->starts_at)->toIso8601String(),
            'ends_at'               => optional($this->ends_at)->toIso8601String(),
            'created_at'            => optional($this->created_at)->toIso8601String(),
        ];
    }
}
