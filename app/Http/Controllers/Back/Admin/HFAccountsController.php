<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HFAccountsController extends AdminBaseController
{
    public function index()
    {
        $data = array_merge($this->data(),[

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
