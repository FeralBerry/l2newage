<?php

namespace App\Http\Controllers\Back\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends AdminBaseController
{
    private $perPage = 20;
    private $path = 'back/seo/img/';
    private function imgDelete($name){
        unlink(public_path($this->path. $name));
    }
    private function seoDB($id = null){
        if($id == null){
            return DB::connection('mysql')
                ->table('seo');
        } else {
            return DB::connection('mysql')
                ->table('seo')
                ->where('id',$id);
        }
    }
    public function index(){
        $data = array_merge($this->data(),[
            'seo' => $this->seoDB()->paginate($this->perPage)
        ]);
        return view('back.admin.seo.index',$data);
    }
    public function add(Request $request){
        $img_name = '';
        if ($request->hasFile('img')) {
            $img_name = $this->fileMove($request->file('img'),$this->path);
        }
        $this->seoDB()
            ->insert([
                'description' => $request['description'],
                'keywords' => $request['keywords'],
                'title' => $request['title'],
                'route_name' => $request['route_name'],
                'img' => $img_name
            ]);
        return redirect()->route('admin-seo-index');
    }
    public function edit(Request $request, $id){
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
        $this->seoDB($id)
            ->update([
                'description' => $request['description'],
                'keywords' => $request['keywords'],
                'title' => $request['title'],
                'route_name' => $request['route_name'],
                'img' => $img_name
            ]);
        return 'Успешно изменена запись SEO';
    }
    public function delete($id){
        foreach ($this->seoDB($id)->get() as $item){
            if($this->checkFileExists($this->path . $item->img) && $item->img !== NULL && $item->img !== ""  ){
                $this->imgDelete($item->img);
            }
        }
        $this->seoDB($id)
            ->delete();
        return "Успешно удалена запись SEO";
    }
}
