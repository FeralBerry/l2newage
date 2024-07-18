<?php

namespace App\Http\Controllers\Back\Admin;


use App\Models\Game\Accounts;
use App\Models\Item;
use App\Models\PaidItem;
use App\Models\Sait\News;
use App\Models\Sait\TagName;
use App\Models\Sait\User;
use Illuminate\Support\Facades\DB;

class IndexController extends AdminBaseController
{
    public function index()
    {
        $count_sait_account = (new User())->getCount();
        $count_game_account = (new Accounts)->getCount();
        $count_news = (new News())->getCount();
        $count_items = (new Item())->getCount();

        $count_tags = count(TagName::all());


        $count_orders = count(DB::table('orders')->where('payment_id','!=',NULL)->where('status',1)->get());
        $count_paid_items = count(PaidItem::all());
        $data = array_merge($this->data(),[
            "count_sait_account" => $count_sait_account,
            "count_game_account" => $count_game_account,
            'count_orders' => $count_orders,
            'count_items' => $count_items,
            'count_paid_items' => $count_paid_items,
            'count_news' => $count_news,
            'count_tags' => $count_tags,
        ]);
        return view('back.admin.index',$data);
    }

}
