<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index(){
        $accounts = DB::connection('l2flame')
            ->table('accounts')
            ->where('email',Auth::user()->email)
            ->select('login','email')
            ->get();
        $chars = DB::connection('l2flame')
            ->table('accounts')
            ->where('email',Auth::user()->email)
            ->join('characters','characters.account_name','=','accounts.login')
            ->select('char_name','level','online','race','classid','base_class','login')
            ->get();
        $shop = Shop::all();
        $paid_item = DB::connection('mysql')
            ->table('paid_item')
            ->where('user_id',Auth::user()->id)
            ->where('postponed',0)
            ->join('item','paid_item.item_id','=','item.id')
            ->get();
        $data = array_merge($this->data(),
            [
                'accounts' => $accounts,
                'chars' => $chars,
                'shop' => $shop,
                'paid_item' => $paid_item,
            ]);
        return view('back.users.index',$data);
    }
    public function newPassword(Request $request){
        if(Auth::user()->password == Hash::make($request['cur_password'])){
            $new_password = Hash::make($request['new_password']);
            DB::table('users')
                ->where('id',Auth::user()->id)
                ->update([
                    'password' => $new_password
                ]);
            return 'Пароль успешно изменен!!';
        } else{
            $data = 'Введен не действительный нынешний пароль';
            return $data;
        }
    }
    public function newPhone(Request $request){
        $phone = $request['phone'];
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update([
                'tel' => $phone
            ]);
        return 'Телефон изменен!!';
    }

}
