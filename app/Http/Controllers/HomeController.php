<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Front\FrontController;

class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array_merge($this->data(),
            [

            ]);
        return view('home',$data);
    }
}
