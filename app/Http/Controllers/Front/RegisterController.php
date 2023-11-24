<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class RegisterController extends FrontController
{
    public function index()
    {
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.register',$data);
    }
}
