<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends AdminBaseController
{
    private $path = 'back/seo/img/';
    private function imgDelete($name){
        unlink(public_path($this->path. $name));
    }
    public function index(){
        $seo = DB::connection('mysql')
            ->table('seo')
            ->paginate(20);
        $data = array_merge($this->data(),[
            'seo' => $seo
        ]);
        return view('back.admin.seo.index',$data);
    }
    public function add(Request $request){
        $img_name = '';
        if ($request->hasFile('img')) {
            $img_name = $this->fileMove($request->file('img'),$this->path);
        }
        DB::connection('mysql')
            ->table('seo')
            ->insert([
                'description' => $request['description'],
                'keywords' => $request['keywords'],
                'title' => $request['title'],
                'url' => $request['url'],
                'img' => $img_name
            ]);
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.seo.add',$data);
    }
    public function edit(Request $request, $id){
        if($request->isMethod('post')){
            $img_name = '';
            if ($request->hasFile('img')) {
                if($this->checkNull($request['old_img'])){
                    if($this->checkFileExists($request['old_img'])){
                        $this->imgDelete($request['old_img']);
                        $img_name = $this->fileMove($request->file('img'),$this->path);
                    } else {
                        $img_name = $this->fileMove($request->file('img'),$this->path);
                    }
                } else {
                    $img_name = $this->fileMove($request->file('img'),$this->path);
                }
            }
            DB::connection('mysql')
                ->table('seo')
                ->where('id',$id)
                ->update([
                    'description' => $request['description'],
                    'keywords' => $request['keywords'],
                    'title' => $request['title'],
                    'url' => $request['url'],
                    'img' => $img_name
                ]);
        }
        $seo = DB::connection('mysql')
            ->table('seo')
            ->where('id',$id)
            ->get();
        $data = array_merge($this->data(),[
            'seo' => $seo
        ]);
        return view('back.admin.seo.edit',$data);
    }
    public function delete($id){
        $seo = DB::connection('mysql')
            ->table('seo')
            ->where('id',$id)
            ->get();
        foreach ($seo as $item){
            if($this->checkFileExists($item->name)){
                $this->imgDelete($item->name);
            }
        }
        DB::connection('mysql')
            ->table('seo')
            ->where('id',$id)
            ->delete();
        return redirect()->route('admin-seo-index');
    }
}
