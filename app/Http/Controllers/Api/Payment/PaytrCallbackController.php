<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Services\Payment\Gateways\PaytrGateway;
use Illuminate\Http\Request;

class PaytrCallbackController extends Controller
{
    public function __construct(protected PaytrGateway $gateway) {}

    public function handle(Request $request)
    {
        $result = $this->gateway->handleCallback($request->all());

        return response('OK', 200); // PayTR genelde plain text ister
    }
}
