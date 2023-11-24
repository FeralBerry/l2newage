<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Cart;
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
    public function index()
    {
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
        foreach ($all_cart as $cart){
            foreach ($header_shop as $shop){
                if($cart->shop_id == $shop->id){
                    $amount = $amount + $cart->count * ($shop->price - ($shop->price * $shop->percent / 100));
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
        $price = (float)$amount;
        $payment = $this->connent()->createPayment([
            'amount' => [
                'value' => $price,
                'currency' => 'RUB',
            ],
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payment-success',$y_id),
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
        }
        return Redirect::to($payment['confirmation']['confirmation_url']);
    }
    public function success($id){
        $yookassa = Yookassa::all()
            ->where('id',$id);
        if(!empty($yookassa)){
            foreach ($yookassa as $item){
                $amount = $item->amount;
                $payment_id = $item->payment_id;
            }
            $payment = $this->connent()->getPaymentInfo($payment_id);
            if(!empty($payment) && $payment['amount']['value'] == $amount){
                $this->connent()->capturePayment([
                    'amount' => $amount,
                ],
                    $payment_id,
                    uniqid('', true)
                );
            }
            if($payment['status'] == 'succeeded'){
                $paid = 1;
            }
            DB::table('yookassa')
                ->where('id',$id)
                ->update([
                        'status' => $payment['status'],
                        'paid' => $paid,
                        'paid_at' => date("Y-m-d H:i:s"),
                    ]);
            $cart = DB::table('cart')
                ->where('user_id',Auth::user()->id);
            foreach ($cart as $item){
                DB::table('orders')
                    ->insert([
                        'user_id' => $item->user_id,
                        'shop_id' => $item->shop_id,
                        'count' => $item->count,
                    ]);
            }
            $order = DB::table('orders')
                ->orderByDesc('created_at')
                ->limit(1);
            foreach ($order as $item){
                $shop = Shop::all()
                    ->where('id',$item->shop_id);
                foreach ($shop as $s){
                    $items_id = explode(',',$s->item_id);
                }
                foreach ($items_id as $i){
                    $paid_item = DB::table('paid_item')
                        ->where('user_id', $item->user_id)
                        ->where('item_id', $i)
                        ->where('postponed','=',NULL);
                    if(isset($paid_item)){
                        foreach ($paid_item as $paid){
                            DB::table('paid_item')
                                ->where('user_id', $item->user_id)
                                ->where('item_id', $i)
                                ->where('postponed','=',NULL)
                                ->update([
                                    'count' => $paid->count + $item->count
                                ]);
                        }
                    } else {
                        DB::table('paid_item')
                            ->insert([
                                'user_id' => $item->user_id,
                                'item_id' => $i,
                                'count' => $item->count,
                            ]);
                    }
                }
            }
            $cart->delete();
            return view('front.payment.success');
        } else {
            abort(404);
        }
    }
    public function check(){
        $yookassa = DB::table('yookassa')
            ->where('user_id',Auth::user()->id)
            ->where('status','pending')
            ->get();
        if(!empty($yookassa)){
            foreach ($yookassa as $item){
                $this->success($item->id);
            }
        }
        return view('front.payment.success');
    }
}
