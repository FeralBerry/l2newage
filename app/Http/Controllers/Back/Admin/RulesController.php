<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function PHPUnit\Framework\isEmpty;

class RulesController extends AdminBaseController
{
    private function takeRules($id){
        return DB::connection('mysql')
            ->table('rule')
            ->where('id',$id);
    }
    public function index($id){
        $rule = $this->takeRules($id)->get();
        if($rule->isEmpty()){
            DB::connection('mysql')
                ->table('rule')
                ->insert([
                    'id' => $id,
                    "name" => "Заголовок нового документа",
                    'description' => "пока тут пусто"
            ]);
            $rule = $this->takeRules($id)->get();
        }
        $lastRule = DB::connection('mysql')
            ->table('rule')
            ->orderByDesc('created_at')
            ->take(1)
            ->get();
        $newId = $lastRule[0]->id + 1;
        $data = array_merge($this->data(),[
            'rules' => $rule[0],
            'newId' => $newId
        ]);
        return view('back.admin.rule.index',$data);
    }
    public function edit(Request $request,$id){
        $this->takeRules($id)
            ->update([
                'description' => $request['rules'],
                'name' => $request['name']
            ]);
        return "success";
    }
}
