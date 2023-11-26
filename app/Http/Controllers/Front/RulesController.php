<?php

namespace App\Http\Controllers\Front;

use App\Models\Rules;

class RulesController extends FrontController
{
    private function takeRules(){
        return Rules::all();
    }
    public function site(){
        $data = array_merge($this->data(),[
            'rules' => $this->takeRules()
        ]);
        return view('front.rules.site',$data);
    }
    public function game(){
        $data = array_merge($this->data(),[
            'rules' => $this->takeRules()
        ]);
        return view('front.rules.game',$data);
    }
}
