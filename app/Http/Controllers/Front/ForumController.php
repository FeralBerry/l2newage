<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumPosts;
use App\Models\TagName;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumController extends FrontController
{
    private $perpage = 10;
    public function index()
    {
        $forum = DB::connection('mysql')
            ->table('forum')
            ->orderBy('updated_at')
            ->paginate($this->perpage);
        $users = User::all();
        $forum_posts = ForumPosts::all();
        $tag_name = TagName::all();
        $data = array_merge($this->data(),
            [
                'forum' => $forum,
                'forum_posts' => $forum_posts,
                'tag_name' => $tag_name,
                'users' => $users,
            ]);
        return view('front.forum.index',$data);
    }
    public function article($id)
    {
        $title = '';
        $forum_posts = DB::table('forum_posts')
            ->where('forum_id',$id)
            ->paginate(10);
        $forum = Forum::all()
            ->where('id',$id);
        foreach ($forum as $item){
            $title = $item->title;
        }
        $users = DB::table('users')
            ->select('id','name','avatar')
            ->get();
        $data = array_merge($this->data(),
            [
                'title' => $title,
                'forum_posts' => $forum_posts,
                'users' => $users,
                'id' => $id
            ]);
        return view('front.forum.article',$data);
    }
    public function search(Request $request){
        $search = $request->search;
        $forum = DB::connection('mysql')
            ->table('forum')
            ->where('title','LIKE',"%{$search}%")
            ->paginate($this->perpage);
        $users = User::all();
        $forum_posts = ForumPosts::all();
        $tag_name = TagName::all();
        $data = array_merge($this->data(),
            [
                'forum' => $forum,
                'search' => $search,
                'forum_posts' => $forum_posts,
                'tag_name' => $tag_name,
                'users' => $users,
            ]);
        return view('front.forum.index',$data);
    }
    public function searchTag(Request $request,$id){
        $tag_name = TagName::all()
            ->where('id',$id);
        foreach ($tag_name as $item){
            $search = $item->name;
        }
        $forum = DB::connection('mysql')
            ->table('forum')
            ->where('tag_name_id','LIKE',$id)
            ->paginate($this->perpage);
        $tag_name = TagName::all();
        $users = User::all();
        $forum_posts = ForumPosts::all();
        $data = array_merge($this->data(),
            [
                'forum' => $forum,
                'search' => $search,
                'tag_name' => $tag_name,
                'users' => $users,
                'forum_posts' => $forum_posts,
            ]);
        return view('front.forum.index',$data);
    }
}
