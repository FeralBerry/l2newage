<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends AdminBaseController
{
    public function index()
    {
        $seo = DB::table('seo')
            ->paginate(20);
        $data = array_merge($this->data(),[
            'seo' => $seo
        ]);
        return view('back.admin.seo.index',$data);
    }
    public function add(Request $request){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.seo.add',$data);
    }
    public function edit(Request $request, $id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.seo.edit',$data);
    }
    public function delete($id){
        DB::table('seo')
            ->where('id',$id)
            ->delete();
        return redirect()->route('admin-seo-index');
    }

}
