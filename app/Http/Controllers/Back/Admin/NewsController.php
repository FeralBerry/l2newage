<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends AdminBaseController
{
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
        $data = array_merge($this->data(),[

        ]);
        return redirect()->route('');
    }
    public function edit($id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.news.edit',$data);
    }
    public function delete($id){

        return redirect()->route('admin-news-index');
    }

}
