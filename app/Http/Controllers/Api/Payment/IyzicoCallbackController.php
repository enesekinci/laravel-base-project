<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Services\Payment\Gateways\IyzicoGateway;
use Illuminate\Http\Request;

class IyzicoCallbackController extends Controller
{
    public function __construct(protected IyzicoGateway $gateway) {}

    public function handle(Request $request)
    {
        $result = $this->gateway->handleCallback($request->all());

        return response()->json(['status' => $result->success ? 'success' : 'failed']);
    }
}
