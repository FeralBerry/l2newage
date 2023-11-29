<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use App\Models\HighFive\Characters as HighFiveChar;
use App\Models\Item;
use App\Models\PaidItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CharacterController extends Controller
{
    public function index()
    {

    }
    public function add($id){

    }
    public function delete($id){

    }
    public function update(Request $request){

    }
    public function addItem(Request $request){
        $items_id = explode(' ',$request['item_id']);
        $items_count = explode(' ',$request['item_count']);
        $char = $request['char'];
        if(count($items_id) !== count($items_count)){
            return "Ошибка данных или вмешательство в работу сайта";
        }
        if ($char == null){
            return "Не выбран персонаж для перевода.";
        }
        $chars = DB::connection('l2flame')
            ->table('accounts')
            ->where('email',Auth::user()->email)
            ->join('characters','characters.account_name','=','accounts.login')
            ->select('char_name')
            ->get();
        $not_have_char = false;
        foreach ($chars as $item){
            if($item->char_name == $char){
                $not_have_char = true;
            }
        }
        $shop_items = DB::connection('mysql')
            ->table('item')
            ->get();
        $paid_item_id = $items_id;
        foreach ($shop_items as $shop_item){
            for($i = 0; $i < count($items_id); $i++){
                if($items_id[$i] == $shop_item->id){
                    $items_id[$i] = $shop_item->item_game_id;
                }
            }
        }
        $paid_items = DB::connection('mysql')
            ->table('paid_item')
            ->where('user_id',Auth::user()->id)
            ->get();
        if($not_have_char == true){
            $owner_id = DB::connection('l2flame')
                ->table('characters')
                ->where('char_name','=',$char)
                ->select('charId')
                ->get();
            foreach ($owner_id as $item){
                $owner_id = $item->charId;
            }
            $msg = '';
            foreach ($paid_items as $paid_item){
                for($i = 0; $i < count($paid_item_id); $i++){
                    if($paid_item->item_id == $paid_item_id[$i]){
                        if($paid_item->count >= $items_count[$i]){
                            $count_items_after = $paid_item->count - $items_count[$i];
                            if($count_items_after > 0){
                                DB::connection('mysql')
                                    ->table('paid_item')
                                    ->where('item_id',$paid_item->item_id)
                                    ->update([
                                        'count' => $count_items_after
                                    ]);
                                DB::connection('mysql')
                                    ->table('paid_item')
                                    ->insert([
                                        'item_id' => $paid_item->item_id,
                                        'user_id' => Auth::user()->id,
                                        'postponed' => 1,
                                        'count' => $paid_item->count
                                    ]);
                            } else {
                                DB::connection('mysql')
                                    ->table('paid_item')
                                    ->where('item_id',$paid_item->item_id)
                                    ->update([
                                        'postponed' => 1,
                                    ]);
                            }
                            DB::connection('l2flame')
                                ->table('items_delayed')
                                ->insert([
                                    'owner_id' => $owner_id,
                                    'item_id' => $items_id[$i],
                                    'count' => $items_count[$i],
                                    'description' => 'Перевод итема с сайта в игру на персонажа',
                                ]);
                        } else {
                            $msg = "Неверное количество предметов";
                            break;
                        }
                    }
                }
            }
            if($msg !== ''){
                return $msg;
            }
            return "Предметы скоро будут переданы в игру";
        } else {
            return "Такого персонажа на вашем аккаунте нет!";
        }
    }
}
