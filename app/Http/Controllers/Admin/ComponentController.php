<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.components');
    }
}
