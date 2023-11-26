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
    public function onTheCharacter(Request $request){
        if(is_array($request['char']) || $request['char'] == NULL){
            return 'Не верное значение персонажа!';
        } else {
            $paid_item = PaidItem::all()
                ->where('id',$request['id'])
                ->where('user_id',Auth::user()->id);
            if(isset($paid_item)){
                foreach ($paid_item as $paid){
                    $count = $paid->count;
                    if($count >= $request['count']){
                        if($paid->postponed == NULL){
                            $item = Item::all()
                                ->where('id',$paid->item_id);
                            foreach ($item as $i){
                                $game_id = $i->item_game_id;
                            }
                            if($request['type'] == 1){
                                $highFive_char = HighFiveChar::all()
                                    ->where('obj_Id',$request['char']);
                                foreach ($highFive_char as $char){
                                    $online = $char->online;
                                }
                                if($online == 0){
                                    DB::connection('l2flame')
                                        ->table('items_delayed')
                                        ->insert([
                                            'owner_id' => $request['char'],
                                            'count' => $request['count'],
                                            'item_id' => $game_id,
                                        ]);
                                    if($count - $request['count'] == 0){
                                        DB::table('paid_item')
                                            ->where('id',$request['id'])
                                            ->where('user_id',Auth::user()->id)
                                            ->update([
                                                'postponed' => 1,
                                            ]);
                                    } else {
                                        DB::table('paid_item')
                                            ->where('id',$request['id'])
                                            ->where('user_id',Auth::user()->id)
                                            ->update([
                                                'count' => $count - $request['count'],
                                            ]);
                                    }
                                    return 'Товары успешно отправлены на персонажа!';
                                }
                                if($online == 1){
                                    return 'Пока персонаж онлайн передать предмет невозможно!';
                                }
                            }
                        } else {
                            return 'Предмет уже был передан на персонажа!';
                        }
                    } else {
                        return 'Что-то пошло не так!';
                    }
                }
            }
        }
    }
}
