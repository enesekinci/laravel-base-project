<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Livewire\Admin\ComponentsShowcase;

class ComponentController extends Controller
{
    public function index(): ComponentsShowcase
    {
        return new ComponentsShowcase;
    }
}
