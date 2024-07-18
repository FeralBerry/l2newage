<?php

namespace App\Http\Controllers\Back\User\Knowledge;



use App\Http\Controllers\Controller;

class RaceController extends Controller
{
    public function index(){
        $data = array_merge($this->data(),
            [

            ]);
        return view('front.knowledge.race.index',$data);
    }
}
