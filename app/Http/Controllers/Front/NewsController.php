<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

use App\Models\NewsComments;
use App\Models\TagName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends FrontController
{
    private $perpage = 5;
    public function index(){
        $news = DB::connection('mysql')
            ->table('news')
            ->paginate($this->perpage);
        $tag_name = TagName::all();
        $data = array_merge($this->data(),
            [
                'news' => $news,
                'tag_name' => $tag_name,
            ]);
        return view('front.news.index',$data);
    }
    public function article($id){
        $title = '';
        $news = DB::connection('mysql')
            ->table('news')
            ->where('id',$id)
            ->orderBy('created_at')
            ->get();
        $tag_name = TagName::all();
        foreach ($news as $new){
            $title = $new->name;
        }
        $comments = DB::table('news_comments')
            ->where('news_id',$id)
            ->paginate(10);
        $count_comments = count($comments);
        $users = DB::table('users')
            ->select('id','name','avatar')
            ->get();
        $data = array_merge($this->data(),
            [
                'title' => $title,
                'news' => $news,
                'tag_name' => $tag_name,
                'comments' => $comments,
                'count_comments' => $count_comments,
                'users' => $users,
            ]);
        return view('front.news.article',$data);
    }
    public function search(Request $request){
        $search = $request->search;
        $news = DB::connection('mysql')
            ->table('news')
            ->where('name','LIKE',"%{$search}%")
            ->orderBy('created_at')
            ->paginate($this->perpage);
        $tag_name = TagName::all();
        $data = array_merge($this->data(),
            [
                'news' => $news,
                'search' => $search,
                'tag_name' => $tag_name,
            ]);
        return view('front.news.index',$data);
    }
    public function searchTag(Request $request,$id){
        $tag_name = TagName::all()
            ->where('id',$id);
        foreach ($tag_name as $item){
            $search = $item->name;
        }
        $news = DB::connection('mysql')
            ->table('news')
            ->where('tag_id','LIKE',"%{$id}%")
            ->orderBy('created_at')
            ->paginate($this->perpage);
        $tag_name = TagName::all();
        $data = array_merge($this->data(),
            [
                'news' => $news,
                'search' => $search,
                'tag_name' => $tag_name,
            ]);
        return view('front.news.index',$data);
    }
}
