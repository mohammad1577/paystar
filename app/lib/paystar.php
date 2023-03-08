<?php

namespace App\lib;

use Illuminate\Support\Facades\Http;

class paystar {
    public $apiPurchaseUrl;
    public $apiVerificationUrl;
    public $gatewayId;
    public $signKey;
    public $callbackUrl;
    public $description;
    
    public function __construct()
    {
        $this->apiPurchaseUrl = env('PAYSTAR_API_PURCHASE_URL', "https://core.paystar.ir/api/pardakht/create/");
        $this->apiVerificationUrl = env('PAYSTAR_API_VERIFICATION_URL', "https://core.paystar.ir/api/pardakht/verify/");
        $this->gatewayId = env('PAYSTAR_GATEWAY_ID', "0yovdk2l6e143");
        $this->signKey = env('PAYSTAR_SIGN_KEY', "9A3EC03483556C73714510C507529DF70A1228C83477D1455E0511BD72C5AAB8A6715A414AA48B7C905FCEF45868BD26DA58196EF29C77C194C9F14A4B47456CC6454E9D50B388D6FC5AC91BB08B234A8060FDC85B1CEC32CA036DC907F8A4A635D9CBB9CAA31B42549B8D70B2CE5EDE8274FFB55DABFE92D76BC42D91696FAF");
        $this->callbackUrl = env('PAYSTAR_CALLBACK_URL', "http://127.0.0.1:8000/callback");
        $this->description = env('PAYSTAR_DESCRIPTION', "payment using paystar");
    }

    public function create($Amount, $OrderId = "", $CardNumber = "", $Description = "")
    {
        try {

            $headers = [
                'Content-Type' => "application/json",
                'Authorization' => "Bearer " . $this->gatewayId
            ];

            $data = [
                "amount" => $Amount,
                "order_id" => $OrderId,
                "callback" => $this->callbackUrl,
                "card_number" => $CardNumber,
                "description" => $Description,
                "callback_method" => 1
            ];

            $response = Http::withHeaders($headers)->post($this->apiPurchaseUrl, $data);
            return $response->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}