<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends AdminBaseController
{
    public function index()
    {
        $users = DB::table('users')
            ->paginate(50);
        $data = array_merge($this->data(),[
            'users' => $users
        ]);
        return view('back.admin.users.index',$data);
    }
    public function add(Request $request){
        if ($request->isMethod("post")){

        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.users.add',$data);
    }
    public function edit(Request $request, $id){
        if ($request->isMethod("post")){

        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.users.edit',$data);
    }
    public function delete($id){
        return redirect()->route('admin-users-index');
    }

}
