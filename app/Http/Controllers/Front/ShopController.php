<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\FilterName;
use App\Models\Item;
use App\Models\Orders;
use App\Models\Shop;
use App\Models\TagName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends FrontController
{
    public function index()
    {

        $filter_name = FilterName::all();
        $shop = DB::table('shop')
            ->paginate(60);
        $mag = '';
        $data = array_merge($this->data(),
            [
                'filter_name' => $filter_name,
                'shop' => $shop,
                'mag' => $mag,
            ]);
        return view('front.shop.index',$data);
    }
    public function article($id)
    {
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.shop.article',$data);
    }
    public function rate($id,$item){
        $rate_shop = explode(',',Auth::user()->rate_shop);
        foreach ($rate_shop as $i){
            if($item == $i){
                return "<script>alert('Ваш голос был уже учтен!')</script>";
            }
        }
        if(Auth::user()->rate_shop == NULL){
            $new_rate = $item;
        } else {
            $new_rate = Auth::user()->rate_shop.','.$item;
        }
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update([
                'rate_shop' => $new_rate
            ]);
        $shop_item = Shop::all()
            ->where('id',$item);
        foreach ($shop_item as $i){
            $rate_1 = $i->rate_1;
            $rate_2 = $i->rate_2;
            $rate_3 = $i->rate_3;
            $rate_4 = $i->rate_4;
            $rate_5 = $i->rate_5;
        }
        if($id == 1){
            $rate_1++;
            DB::table('shop')
                ->where('id',$item)
                ->update([
                    'rate_1' => $rate_1,
                ]);
        } elseif($id == 2){
            $rate_2++;
            DB::table('shop')
                ->where('id',$item)
                ->update([
                    'rate_2' => $rate_2,
                ]);
        } elseif($id == 3){
            $rate_3++;
            DB::table('shop')
                ->where('id',$item)
                ->update([
                    'rate_3' => $rate_3,
                ]);
        } elseif($id == 4){
            $rate_4++;
            DB::table('shop')
                ->where('id',$item)
                ->update([
                    'rate_4' => $rate_4,
                ]);
        } elseif($id == 5){
            $rate_5++;
            DB::table('shop')
                ->where('id',$item)
                ->update([
                    'rate_5' => $rate_5,
                ]);
        }
        $sum_rate = $rate_1 + $rate_2 + $rate_3 + $rate_4 + $rate_5;
        $score = $rate_1 + $rate_2 * 2 + $rate_3 * 3 + $rate_4 * 4 + $rate_5 * 5;
        $rating = $score / $sum_rate;
        return $rating;
    }

    public function search(Request $request){
        $search = $request->search;
        $shop = DB::connection('mysql')
            ->table('shop')
            ->where('title','LIKE',"%{$search}%")
            ->paginate(60);
        $filter_name = FilterName::all();
        $data = array_merge($this->data(),
            [
                'search' => $search,
                'filter_name' => $filter_name,
                'shop' => $shop,
                'orders' => $this->orders(),
            ]);
        return view('front.shop.index',$data);
    }
    public function product($id){
        $shop = Shop::all();
        $product = Shop::all()
            ->where('id',$id);
        $items = Item::all();
        foreach ($product as $item){
            $product_name = $item->title;
        }
        $data = array_merge($this->data(),[
            'product_name' => $product_name,
            'product' => $product,
            'shop' => $shop,
            'items' => $items,
        ]);
        return view('front.shop.article',$data);
    }
}
