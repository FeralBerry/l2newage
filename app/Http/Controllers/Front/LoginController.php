<?php

namespace App\Http\Controllers\Front;

class LoginController extends FrontController
{
    public function index(){
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.login',$data);
    }
}
