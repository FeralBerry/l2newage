<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AccountsController extends AdminBaseController
{
    public function index(){
        $accounts = DB::connection('l2flame')
            ->table('accounts')
            ->join('characters','characters.account_name','=','accounts.login')
            ->select('login','email','characters.accessLevel','level','char_name','charId','pvpkills','pkkills','online')
            ->paginate(20);
        $data = array_merge($this->data(),[
            'accounts' => $accounts
        ]);
        return view('back.admin.accounts.index',$data);
    }
    public function add(Request $request){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.accounts.add',$data);
    }
    public function edit(Request $request, $id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.accounts.edit',$data);
    }
    public function delete($id){

        return redirect()->route('admin-fr-accounts-index');
    }
}
