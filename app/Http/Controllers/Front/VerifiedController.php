<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\DB;

class VerifiedController extends FrontController
{
    public function index($link){
        if($link !== null){
            $user = DB::connection('mysql')
                ->table('users')
                ->where('verified_link','=', $link)
                ->select('name','email','email_verified_at')
                ->get();
            foreach ($user as $item){
                if($item->email_verified_at !== null){
                    return view('back.users.already_verified',$user);
                } else {
                    if($user !== null){

                        return view('back.users.success_verified',$user);
                    } else {
                        return view('back.users.error_verified');
                    }
                }
            }
        }
        return view('back.users.error_verified');
    }
}
