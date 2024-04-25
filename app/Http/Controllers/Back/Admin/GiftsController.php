<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftsController extends AdminBaseController
{
    public function index()
    {
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.gifts.index',$data);
    }
    public function add(Request $request){
        if($request->isMethod("post")){

        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.gifts.add',$data);
    }
    public function edit(Request $request, $id){
        if($request->isMethod("post")){

        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.gifts.edit',$data);
    }
    public function delete($id){
        return redirect()->route('admin-gifts-index');
    }

}
