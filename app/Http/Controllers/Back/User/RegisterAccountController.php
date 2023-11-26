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
        if(Auth::user()->email_verified_at !== null){
            if(strlen($request['login']) > 3){
                return 'Логин аккаунта должен быть больше 3 символов';
            } elseif (strlen($request['login']) < 30){
                return 'Логин аккаунта должен быть меньше 30 символов';
            } else {
                if (Auth::user()->email !== null){
                    DB::connection('l2flame')
                        ->table('accounts')
                        ->insert([
                            'email' => Auth::user()->email,
                            'login' => $request['login'],
                            'password' => $password,
                        ]);
                    return 'Ваш аккаунт успешно зарестрирован!';
                } else {
                    return 'Произошла ошибка попробуйте позже.';
                }
            }
        } else {
            return 'Для регистрации аккаунтов нужно подтвердить почту.';
        }
    }
}
