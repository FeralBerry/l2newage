<?php

namespace App\Http\Controllers\Back\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class RegisterAccountController extends Controller
{
    public function reg(Request $request){
        if($request['pass'] > 50 && $request['pass'] < 8){
            return 'Пароль должен быть от 8 до 50 символов';
        }
        $password = base64_encode(pack("H*", sha1(utf8_encode($request['pass']))));
        if(Auth::user()->email_verified_at == null){
            return 'Для регистрации аккаунтов нужно подтвердить почту.';
        } else {
            if(strlen($request['login']) < 3){
                return 'Логин аккаунта должен быть больше 3 символов';
            } elseif (strlen($request['login']) > 30){
                return 'Логин аккаунта должен быть меньше 30 символов';
            } else {
                $alreadyLogin = DB::connection('l2flame')
                    ->table('accounts')
                    ->where('login',$request['login'])
                    ->get();
                if($alreadyLogin == null){
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
                } else {
                    return 'Такой аккаунт уже существует';
                }
            }
        }
    }
    public function regNewPassword(Request $request){
        if($request['new_password_for_account'] > 50 && $request['new_password_for_account'] < 8){
            return 'Пароль должен быть от 8 до 50 символов';
        }
        $user_account = DB::connection('l2flame')
            ->table('accounts')
            ->where('email', Auth::user()->email)
            ->get();
        if($user_account == null){
            return 'Это не ваш аккаунт';
        }
        $password = base64_encode(pack("H*", sha1(utf8_encode($request['new_password_for_account']))));
        DB::connection('l2flame')
            ->table('accounts')
            ->where('email', Auth::user()->email)
            ->where('login', $request['login'])
            ->update([
                'password' => $password,
            ]);
        return 'Пароль для аккаунта ' . $request['login'] . " успешно изменен.";
    }
}
