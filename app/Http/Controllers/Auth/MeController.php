<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function me(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
