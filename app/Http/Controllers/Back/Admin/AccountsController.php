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
            ->paginate(50);
        $data = array_merge($this->data(),[
            'accounts' => $accounts
        ]);
        return view('back.admin.accounts.index',$data);
    }
    public function characterSearch(Request $request){
        $search = $request['search'];
        $accounts = DB::connection('l2flame')
            ->table('accounts')
            ->join('characters','characters.account_name','=','accounts.login')
            ->select('login','email','characters.accessLevel','level','char_name','charId','pvpkills','pkkills','online')
            ->where('char_name','LIKE',"%$search%")
            ->orWhere('email','LIKE',"%$search%")
            ->orWhere('login','LIKE',"%$search%")
            ->paginate(50);
        if(!empty($accounts)){
            $msg = 'Успешный поиск по ' . $search;
        } else {
            $msg = 'Ничего не найдено';
        }
        $data = array_merge($this->data(),[
            'accounts' => $accounts,
            'msg' => $msg,
        ]);
        return view('back.admin.accounts.index',$data);
    }
    public function characterIndex($charId){
        $character = DB::connection('l2flame')
            ->table('characters')
            ->where('charId',$charId)
            ->get();
        $data = array_merge($this->data(),[
            'character' => $character
        ]);
        return view('back.admin.accounts.charIndex',$data);
    }
    public function characterEdit(Request $request, $charId){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.accounts.edit',$data);
    }
    public function delete($charId){

        return redirect()->route('admin-accounts-index');
    }
}
