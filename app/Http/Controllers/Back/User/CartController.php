<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{
    public function index()
    {
        $cart = '';
        $over = 0;
        $shop = Shop::all();
        if(Auth::user()){
            $cart = DB::table('cart')
                ->where('user_id',Auth::user()->id)
                ->paginate(20);
            $cart_over = Cart::all()
                ->where('user_id',Auth::user()->id);
            if(count($cart_over) > 0){
                foreach ($cart_over as $item){
                    foreach ($shop as $s){
                        if($s->id == $item->shop_id){
                            $over = $over + ($s->price - ($s->price * $s->percent / 100)) * $item->count;
                        }
                    }
                }
            }
        }
        $data = array_merge($this->data(),
            [
                'cart' => $cart,
                'over' => $over,
                'shop' => $shop,
            ]);
        return view('front.cart.index',$data);
    }
    public function add($id){
        $cart = Cart::all();
        foreach ($cart as $item){
            if($item->shop_id == $id && Auth::user()->id == $item->user_id){
                $count = $item->count;
                DB::table('cart')
                    ->where('user_id',Auth::user()->id)
                    ->where('shop_id',$id)
                    ->update([
                        'count' => $count + 1,
                    ]);
                $cart = DB::table('cart')
                    ->where('user_id',Auth::user()->id)
                    ->join('shop','cart.shop_id','=','shop.id')
                    ->get();
                return $cart;
            }
        }
        DB::table('cart')
            ->insert([
                'user_id' => Auth::user()->id,
                'shop_id' => $id,
                'count' => 1,
            ]);
        $cart = DB::table('cart')
            ->where('user_id',Auth::user()->id)
            ->join('shop','cart.shop_id','=','shop.id')
            ->get();
        return $cart;
    }
    public function delete($id){
        if(Auth::user()){
            DB::table('cart')
                ->where('shop_id',$id)
                ->where('user_id',Auth::user()->id)
                ->delete();
            $cart = Cart::all()
                ->where('user_id',Auth::user()->id);
            $over = 0;
            $shop = Shop::all();
            if(!empty($cart)){
                foreach ($cart as $item){
                    foreach ($shop as $s){
                        if($s->id == $item->shop_id){
                            $over = $over + $item->count * ($s->price - ($s->price * $s->percent / 100));
                        }
                    }
                }
            }
            return $over;
        } else {
            return "<script>alert('Для удаления из корзины нужно быть авторизованым!')</script>";
        }
    }
    public function update(Request $request){
        if($request['num'] > 0){
            DB::table('cart')
                ->where('shop_id',$request['id'])
                ->where('user_id',Auth::user()->id)
                ->update([
                    'count' => $request['num']
                ]);
            $shop = Shop::all()
                ->where('id',$request['id']);
            foreach ($shop as $s){
                $item_price = $s->price - ($s->price * $s->percent / 100);
                $item_max_price = $s->price;
            }
            $price = $item_price * $request['num'];
            $max_price = $item_max_price * $request['num'];
            $cart = DB::table('cart')
                ->where('user_id',Auth::user()->id)
                ->get();
            $over_price = 0;
            $shop_all = DB::table('shop')->get();
            foreach ($shop_all as $s){
                foreach ($cart as $c){
                    if($c->shop_id == $s->id){
                        $over_price = $over_price + $c->count * ($s->price - ($s->price * $s->percent /100));
                    }
                }
            }

            $data = [
                'max_price' => $max_price,
                'price' => $price,
                'over_price' => $over_price,
            ];
            return $data;
        } else {
            return 'Проверка количества не пройдена';
        }
    }
}
