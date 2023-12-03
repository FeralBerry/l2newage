<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Forum;
use App\Models\News;
use App\Models\Seo;
use App\Models\Shop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function data(){
        $orders = DB::table('orders')
            ->orderByDesc('updated_at')
            ->paginate(6);
        $data = [
            'latest_news' => $this->latestNews(),
            'latest_forum' => $this->lastForum(),
            'seo' => $this->seo(),
            'orders' => $orders,
            'header_shop' => $this->headerShop(),
        ];
        $header_cart = $this->headerCart();
        $header_shop = $this->headerShop();
        $header_price = 0;
        $count = 0;
        if(!empty($header_cart)){
            $count = count($this->headerCart());
            foreach ($header_cart as $cart){
                foreach ($header_shop as $shop){
                    if($cart->shop_id == $shop->id){
                        $header_price = $header_price + $cart->count * ($shop->price - ($shop->price * $shop->percent / 100));
                    }
                }
            }
        }

        if(Auth::user()){
            $data = array_merge($data,[
                'header_cart' => $this->headerCart()->take(4),
                'header_price' => $header_price,
                'header_count' => $count,
            ]);
        }
        return $data;
    }
    public function latestNews(){
        $news = News::all()->sortBy('created_at')->take(5);
        return $news;
    }
    public function seo(){
        $seo = Seo::all();
        return $seo;
    }
    public function lastForum(){
        $last_forum = Forum::all()
            ->sortBy('updated_at')
            ->take(5);
        return $last_forum;
    }
    public function headerCart(){
        $cart = '';
        if(Auth::user()){
            $cart = Cart::all()
                ->where('user_id',Auth::user()->id);
        }
        return $cart;
    }
    public function headerShop(){
        $shop = Shop::all();
        return $shop;
    }
}
