<?php

namespace App\Http\Controllers\Front;


use App\Models\Sait\Partner;
use App\Models\Sait\Shop;
use App\Models\Sait\TagName;


class IndexController extends FrontController
{
    public function __construct(){

    }
    public function index()
    {
        $tag_name = TagName::all();
        $partner = Partner::all();
        $shop_purchased = Shop::all()
            ->where('closed_sale', '=',0)
            ->where('purchased',1);
        $shop_sales = Shop::all()
            ->where('closed_sale', '=',0)
            ->where('sales',1);
        $data = array_merge($this->data(),
                            [
                                'tag_name' => $tag_name,
                                'partner' => $partner,
                                'shop_purchased' => $shop_purchased,
                                'shop_sales' => $shop_sales,
                            ]);
        return view('front.index',$data);
    }
}
