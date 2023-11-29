<?php

namespace App\Http\Controllers\Front;

use App\Models\Rules;
use Illuminate\Support\Facades\DB;

class RulesController extends FrontController
{
    private function takeRules($id){
        return DB::connection('mysql')
            ->table('rule')
            ->where('id',$id);
    }
    public function index($id){
        $rule = $this->takeRules($id)->get();
        $data = array_merge($this->data(),[
            'rules' => $rule[0]
        ]);
        return view('front.rules.index',$data);
    }
}
