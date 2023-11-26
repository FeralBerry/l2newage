<?php

namespace App\Http\Controllers\Back\Admin;


use App\Models\Fafurion\Accounts as AccountsFafurion;
use App\Models\HighFive\Accounts as AccountsHighfive;
use App\Models\Item;
use App\Models\News;
use App\Models\PaidItem;
use App\Models\TagName;
use App\User;
use Illuminate\Support\Facades\DB;

class IndexController extends AdminBaseController
{
    public function index()
    {
        $count_users = count(User::all());
        $count_paid_items = count(PaidItem::all());
        $count_items = count(Item::all());
        $count_orders = count(DB::table('orders')->get());
        $count_news = count(News::all());
        $count_tags = count(TagName::all());
        $data = array_merge($this->data(),[
            'count_users' => $count_users,
            'count_orders' => $count_orders,
            'count_items' => $count_items,
            'count_paid_items' => $count_paid_items,
            'count_news' => $count_news,
            'count_tags' => $count_tags,
        ]);
        return view('back.admin.index',$data);
    }

}
