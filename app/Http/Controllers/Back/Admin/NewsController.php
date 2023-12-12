<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends AdminBaseController
{
    private $path = 'front/img/news';
    private function newsDB($id = null){
        if($id == null){
            return DB::connection('mysql')
                ->table('news');
        } else {
            return DB::connection('mysql')
                ->table('news')
                ->where('id',$id);
        }
    }
    public function index(){
        $news = DB::connection('mysql')
            ->table('news')
            ->orderByDesc('updated_at')
            ->paginate(20);
        $tag_name = DB::connection('mysql')
            ->table('tag_name')
            ->get();
        $data = array_merge($this->data(),[
            "news" => $news,
            "tag_name" => $tag_name
        ]);
        return view('back.admin.news.index',$data);
    }
    public function add(){
        $tag_name = DB::connection('mysql')
            ->table('tag_name')
            ->get();
        $data = array_merge($this->data(),[
            "tag_name" => $tag_name
        ]);
        return view('back.admin.news.add',$data);
    }
    public function addNews(Request $request){
        $img_name = '';
        if ($request->hasFile('img')) {
            $img_name = $this->fileMove($request->file('img'),$this->path);
        }
        $this->newsDB()
            ->insert([
                'description' => $request['description'],
                'name' => $request['title'],
                'img' => $img_name,
                'tag_id' => $request['tag'],
            ]);
        return redirect()->route('admin-news-index');
    }
    public function edit($id){
        $tag_name = DB::connection('mysql')
            ->table('tag_name')
            ->get();
        $news = $this->newsDB($id)->get();
        $data = array_merge($this->data(),[
            "tag_name" => $tag_name,
            'news' => $news,
            'id' => $id,
        ]);
        return view('back.admin.news.edit',$data);
    }
    public function editNews(Request $request,$id){
        $img_name = '';
        if($request['old_img'] !== null){
            $img_name = $request['old_img'];
        }
        if ($request->hasFile('img')) {
            $img_name = $this->fileMove($request->file('img'),$this->path);
        }
        $this->newsDB($id)
            ->update([
                'description' => $request['description'],
                'name' => $request['title'],
                'img' => $img_name,
                'tag_id' => $request['tag'],
            ]);
        return redirect()->route('admin-news-index');
    }

    public function delete($id){
        foreach ($this->newsDB($id)->get() as $item){
            if($this->checkFileExists($this->path . $item->img) && $item->img !== NULL && $item->img !== "" ){
                $this->imgDelete($item->img);
            }
        }
        $this->newsDB($id)->delete();
        return redirect()->route('admin-news-index');
    }

}
