<?php

namespace App\Http\Controllers\Front;


use App\Models\Sait\Cart;
use App\Models\Sait\Shop;
use App\Models\Yookassa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use JetBrains\PhpStorm\NoReturn;
use YooKassa\Client;


class PaymentController extends FrontController
{
    public function index(){
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.payment.index',$data);
    }
    public function create(Request $request)
    {
        if($request->isMethod("post")){
            $user_id = Auth::user()->id;
            $all_cart = Cart::all()
                ->where('user_id',$user_id);
            $header_shop = Shop::all();
            $amount = 0;
            DB::connection('mysql')
                ->table('orders')
                ->insert([
                    'user_id' => $user_id,
                ]);
            $order = DB::connection('mysql')
                ->table('orders')
                ->orderByDesc('created_at')
                ->take(1)
                ->get();
            $order_id = 0;
            foreach($order as $item) {
                $order_id = $item->id;
            }
            $items = array();
            foreach ($all_cart as $cart){
                foreach ($header_shop as $shop){
                    if($cart->shop_id == $shop->id){
                        $price = ($shop->price - ($shop->price * $shop->percent / 100))*100;
                        $amount = $amount + $cart->count * $price;
                        DB::connection('mysql')
                            ->table('orders_items')
                            ->insert([
                                "name" => $shop->title,
                                "order_id" => $order_id,
                                "count" => $cart->count,
                                "shop_id" => $cart->shop_id,
                                "price" => $price
                            ]);
                        $item = array(
                            "Name" => $shop->title,
                            "Price" => $price,
                            "Quantity" => $cart->count,
                            "Amount" => $price * $cart->count,
                            "Tax" => "vat18"
                        );
                        $items[] = $item;
                    }
                }
            }

            $receipt = array("Email" => Auth::user()->email,"Taxation" => "osn","Items" => $items);
            $TerminalKey = "1721138128355DEMO";
            $password = "b_jE_R%M!q8fFlor";
            $user_data = array("Email" => Auth::user()->email);
            $description = "Покупка на сайте L2NewAge";
            $successURL = "https://l2newage.ru/payment/success/".$order_id."/".Auth::user()->id;
            $token = hash('sha256', $amount.$description.$order_id.$password.$successURL.$TerminalKey);
            $data = array(
                "Amount" => $amount,
                "DATA" => $user_data,
                "Description" => $description,
                "OrderId" => $order_id,
                "Password" => $password,
                "Receipt" => $receipt,
                "SuccessURL" => $successURL,
                "TerminalKey" => $TerminalKey,
                "Token" => $token,
            );

            $ch = curl_init('https://securepay.tinkoff.ru/v2/Init');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);

            $res = json_decode($res, true);
            if (!empty($res['PaymentURL'])) {
                DB::connection("mysql")
                    ->table('orders')
                    ->where("id", $order_id)
                    ->update([
                        'amount' => $amount,
                        'payment_id' => $res['PaymentURL']
                    ]);
                // Редирект в платёжную систему.
                header('Location: ' . $res['PaymentURL'], true, 301);
                exit();
            }
        }

        return redirect()->route("front-index");
    }
    public function success($id,$user_id){
        DB::connection('mysql')
            ->table('orders')
            ->where('id',$id)
            ->update([
                'status' => 1
            ]);
        $items = DB::connection("mysql")
            ->table('orders_items')
            ->where('order_id', $id)
            ->get();
        $paid_item = DB::connection('mysql')
            ->table('paid_item')
            ->where('user_id',$user_id)
            ->where('postponed', 0)
            ->get();
        if(empty($paid_item)){
            foreach ($paid_item as $item){
                foreach ($items as $order){
                    if($item->item_id == $order->shop_id){
                        DB::connection('mysql')
                            ->table('paid_item')
                            ->where('item_id', $order->shop_id)
                            ->update([
                                'count' => $item->count + $order->count,
                            ]);
                    } else {
                        DB::connection('mysql')
                            ->table('paid_item')
                            ->insert([
                                'user_id' => $order->user_id,
                                'item_id' => $order->shop_id,
                                'count' => $order->count,
                            ]);
                    }
                }
            }
        } else {
            foreach ($items as $item){
                DB::connection('mysql')
                    ->table('paid_item')
                    ->insert([
                        'user_id' => $user_id,
                        'item_id' => $item->shop_id,
                        'count' => $item->count,
                    ]);
            }
        }
        DB::connection('mysql')
            ->table('cart')
            ->where('user_id',$user_id)
            ->delete();
        return view('front.payment.success');
    }
    public function check($id){
        $yookassa = DB::table('yookassa')
            ->where('user_id',Auth::user()->id)
            ->where('payment_id',$id)
            ->get();
        $payment_amount = 0;
        foreach ($yookassa as $item){
            $payment_amount = $item->amount;
        }
        $this->connent()->capturePayment(
            array(
                'amount' => $payment_amount,
            ),
            $id,
            uniqid('', true)
        );
        return view('front.payment.success');
    }
}
