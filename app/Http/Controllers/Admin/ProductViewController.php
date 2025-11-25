<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductViewController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.form');
    }

    public function edit($id)
    {
        return view('admin.products.form', ['id' => $id]);
    }
}
