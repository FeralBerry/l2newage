<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShopController extends AdminBaseController
{
    private function dbShop($id = null){
        if($id == null){
            return DB::table('item');
        } else {
            return DB::table('item')
                ->where('id',$id);
        }
    }
    public function index(){
        $shop = DB::connection('mysql')
            ->table('shop')
            ->paginate(25);
        $items = DB::connection('mysql')
            ->table('item')
            ->select('name','description','type','img','temporary','item_game_id','game_price')
            ->get();
        $data = array_merge($this->data(),[
            'shop' => $shop,
            'items' => $items,
        ]);
        return view('back.admin.shop.index',$data);
    }
    public function addGet(){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.shop.add',$data);
    }
    public function addPost(Request $request){

        return redirect()->route('admin-shop-index');
    }
    public function editGet($id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.shop.edit',$data);
    }
    public function editPost(Request $request, $id){

        return redirect()->route('admin-shop-index');
    }
    public function delete($id){

        return redirect()->route('admin-shop-index');
    }
}
