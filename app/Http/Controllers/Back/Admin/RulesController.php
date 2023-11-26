<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class RulesController extends AdminBaseController
{
    private function takeRules($id){
        return DB::connection('mysql')
            ->table('rule')
            ->where('id',$id);
    }
    public function index($id){
        $rule = $this->takeRules($id)->get();
        if($rule[0] == NULL){
            $this->takeRules($id)->insert([
                'id' => $id,
                'description' => null
            ]);
        }
        $data = array_merge($this->data(),[
                'rules' => $rule[0]
        ]);
        return view('back.admin.rule.index',$data);
    }
    public function edit(Request $request,$id){
        $this->takeRules($id)
            ->update([
                'description' => $request['rules']
            ]);
        return "success";
    }
}
