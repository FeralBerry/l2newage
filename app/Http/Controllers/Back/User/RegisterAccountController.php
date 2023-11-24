<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterAccountController extends Controller
{
    public function reg(Request $request)
    {
        $password = base64_encode(pack("H*", sha1(utf8_encode($request['pass']))));
        if($request['server'] == 1){
            DB::connection('l2flame')
                ->table('accounts')
                ->insert([
                    'email' => Auth::user()->email,
                    'login' => $request['login'],
                    'password' => $password,
                ]);
            return 'success';
        } else {
            return 'Произошла ошибка попробуйте позже.';
        }
    }
}
