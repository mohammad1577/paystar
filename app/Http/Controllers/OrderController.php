<?php

namespace App\Http\Controllers;

use App\lib\paystar;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = auth()->user()->orders()->create([
            "price" => $request->price
        ]);
        return redirect("checkout");
    }

    public function show(Request $request)
    {
        $order = auth()->user()->orders()->where("status", "new")->first();
        $paystar = new paystar();
        $response = $paystar->create($order->price, $order->id, auth()->user()->cart_number, "this is just to buy a product with $order->price cost");
        if ($response["status"] === true) {
            $order->update([
                "ref_id" => $response["data"]["ref_num"]
            ]);
        }
        return view("home.checkout")->with("response", $response);
    }

    public function callback(Request $request)
    {
        if ($status = $request->status === 1) {
            $order = auth()->user()->oredrs()->where("ref_id", $request->ref_num)->first();
            $order->update([
                "t_id" => $request->transaction_id,
                "status" => "ok"
            ]);
        }
        $message = $this->getMessage($request->status);
        return view("home.invoice", compact("status", "message"));
    }

    public static function getMessage($status)
    {
        $message = "";
        switch ($status) {
            case -1:
                $message = "درخواست نامعتبر (خطا در پارامترهای ورودی)";
                break;
            case -2:
                $message = "درگاه فعال نیست";
                break;
            case -3:
                $message = "توکن تکراری است";
                break;
            case -4:
                $message = "مبلغ بیشتر از سقف مجاز درگاه است";
                break;
            case -5:
                $message = "شناسه ref_num معتبر نیست";
                break;
            case -6:
                $message = "تراکنش قبلا وریفای شده است";
                break;
            case -7:
                $message = "پارامترهای ارسال شده نامعتبر است";
                break;
            case -8:
                $message = "تراکنش را نمیتوان وریفای کرد";
                break;
            case -9:
                $message = "تراکنش وریفای نشد";
                break;
            case -98:
                $message = "تراکنش ناموفق";
                break;
            case -99:
                $message = "خطای سامانه";
                break;
            default:
                $message = "undefined";
                break;
        }
        return $message;
    }
}
