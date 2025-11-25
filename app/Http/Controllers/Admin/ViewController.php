<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Generic View Controller for Admin pages
 * Returns Blade views for admin modules
 */
class ViewController extends Controller
{
    public function index($module)
    {
        $view = "admin.{$module}.index";
        if (! view()->exists($view)) {
            abort(404, "View not found: {$view}");
        }

        return view($view);
    }

    public function create($module)
    {
        $view = "admin.{$module}.form";
        if (! view()->exists($view)) {
            abort(404, "View not found: {$view}");
        }

        return view($view);
    }

    public function edit($module, $id)
    {
        $view = "admin.{$module}.form";
        if (! view()->exists($view)) {
            abort(404, "View not found: {$view}");
        }

        return view($view, ['id' => $id]);
    }

    public function show($module, $id)
    {
        $view = "admin.{$module}.show";
        if (! view()->exists($view)) {
            // Fallback to form view
            $view = "admin.{$module}.form";
        }
        if (! view()->exists($view)) {
            abort(404, "View not found: admin.{$module}.show or admin.{$module}.form");
        }

        return view($view, ['id' => $id]);
    }
}
