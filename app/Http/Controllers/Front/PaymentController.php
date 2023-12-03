<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Shop;
use App\Models\Yookassa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use YooKassa\Client;


class PaymentController extends FrontController
{
    private function connent(){
        $shop_id = env('YOOKASSA_ID',null);
        $token = env('YOOKASSA_TOKEN',null);
        $client = new Client();
        $client->setAuth($shop_id, $token);
        return $client;
    }
    public function index(){
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.payment.index',$data);
    }
    public function create(Request $request){
        $all_cart = Cart::all()
            ->where('user_id',Auth::user()->id);
        $header_shop = Shop::all();
        $amount = 0;
        $now = now();
        foreach ($all_cart as $cart){
            foreach ($header_shop as $shop){
                if($cart->shop_id == $shop->id){
                    $amount = $amount + $cart->count * ($shop->price - ($shop->price * $shop->percent / 100));
                    $price = $cart->count * ($shop->price - ($shop->price * $shop->percent / 100));
                    DB::connection('mysql')
                        ->table('orders')
                        ->insert([
                            'user_id' => Auth::user()->id,
                            'shop_id' => $shop->id,
                            'count' => $cart->count,
                            'created_at' => $now,
                            'amount' => number_format((float)$price, 2, '.', ''),
                        ]);

                }
            }
        }
        $yookassa_id = Yookassa::all()
            ->sortByDesc('created_at')
            ->take(1);
        if(!empty($yookassa_id)){
            foreach ($yookassa_id as $item){
                $y_id = $item->id + 1;
            }
        } else {
            $y_id = 1;
        }
        $price = number_format((float)$amount, 2, '.', '');
        $payment = $this->connent()->createPayment([
            'amount' => [
                'value' => $price,
                'currency' => 'RUB',
            ],
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payment-success',['id' => $y_id,'user_id' =>Auth::user()->id]),
            ],
            'capture' => false,
            'description' => 'Заказ №'.$y_id,
            'metadata' => [
                'order_id' => $y_id,
            ],
        ],
            uniqid('', true)
        );
        if($payment['metadata']['order_id'] == $y_id){
            Yookassa::create([
                'id' => $y_id,
                'payment_id' => $payment['id'],
                'user_id' => Auth::user()->id,
                'status' => $payment['status'],
                'amount' => $price,
                'currency' => $payment['amount']['currency'],
                'description' => $payment['description'],
                'payment_link' => $payment['confirmation']['confirmation_url'],
            ]);
            DB::connection('mysql')
                ->table('orders')
                ->where('user_id',Auth::user()->id)
                ->where('created_at',$now)
                ->update([
                    'payment_id' => $payment['id'],
                ]);
        }
        return Redirect::to($payment['confirmation']['confirmation_url']);
    }
    public function success($id,$user_id){
        $yookassa = Yookassa::all()
            ->where('id',$id);
        if(!empty($yookassa)){
            foreach ($yookassa as $item){
                $amount = $item->amount;
                $payment_id = $item->payment_id;
                $paid_at = $item->paid_at;
            }
            if($paid_at == null){
                return view('front.payment.error');
            }
            $payment = $this->connent()->getPaymentInfo($payment_id);
            $this->connent()->capturePayment([
                'amount' => $amount,
            ],
                $payment_id,
                uniqid('', true)
            );
            DB::table('yookassa')
                ->where('id',$id)
                ->update([
                    'status' => $payment['status'],
                    'paid_at' => date("Y-m-d H:i:s"),
                ]);
            if($payment['status'] == 'waiting_for_capture'){
                DB::connection('mysql')
                    ->table('orders')
                    ->where('payment_id',$payment_id)
                    ->update([
                        'status' => 1
                    ]);
                DB::connection('mysql')
                    ->table('cart')
                    ->where('user_id',$user_id)
                    ->delete();
                $orders = DB::connection('mysql')
                    ->table('orders')
                    ->where('payment_id',$payment_id)
                    ->get();
                $paid_item = DB::connection('mysql')
                    ->table('paid_item')
                    ->where('user_id',$user_id)
                    ->where('postponed', 0)
                    ->get();
                if(empty($paid_item)){
                    foreach ($paid_item as $item){
                        foreach ($orders as $order){
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
                    foreach ($orders as $order) {
                        DB::connection('mysql')
                            ->table('paid_item')
                            ->insert([
                                'user_id' => $order->user_id,
                                'item_id' => $order->shop_id,
                                'count' => $order->count,
                            ]);
                    }
                }
                $payment = $this->connent()->getPaymentInfo($payment_id);
                DB::table('yookassa')
                    ->where('id',$id)
                    ->update([
                        'status' => $payment['status'],
                    ]);
                return view('front.payment.success');
            }  elseif ($payment['status'] == 'succeeded'){
                return view('front.payment.error');
            }
        } else {
            abort(404);
        }
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
