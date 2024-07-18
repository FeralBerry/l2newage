<?php

namespace App\Http\Controllers\Back\Admin;



use App\Models\Sait\Forum;
use App\Models\Sait\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends AdminBaseController
{
    public function index() {
        $tags = DB::table('tag_name')
            ->paginate(30);
        $data = array_merge($this->data(),[
            'tags' => $tags
        ]);
        return view('back.admin.tags.index',$data);
    }
    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            DB::table('tag_name')
                ->insert([
                    'name' => $request['tag_name']
                ]);
            return redirect()->route("admin-tags-index");
        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.tags.add',$data);
    }
    public function edit(Request $request, $id) {
        $tag = DB::table("tag_name")
            ->where('id',$id)
            ->get();
        $tag_name = "";
        if(!empty($tag)){
            foreach ($tag as $item){
                $tag_name = $item->name;
            }
        } else {
            return redirect()->route("admin-tags-index");
        }
        if ($request->isMethod("post")) {
            DB::table('tag_name')
                ->where('id',$id)
                ->update([
                    'name' => $request['tag_name']
                ]);
            return redirect()->route("admin-tags-index");
        }
        $data = array_merge($this->data(),[
            'id' => $id,
            'tag_name' => $tag_name
        ]);
        return view('back.admin.tags.edit',$data);
    }
    public function delete($id)
    {
        $forum = Forum::all();
        $news = News::all();
        $new_tags_forum = '';
        $new_tags_news = '';
        foreach ($forum as $item) {
            $tags = explode(',',$item->tag_name_id);
            foreach ($tags as $tag){
                if($tag !== $id){
                    $new_tags_forum = $tag.','.$new_tags_forum;
                }
            }
            DB::table('forum')
                ->where('id',$item->id)
                ->update([
                    'tag_name_id' => mb_substr($new_tags_forum, 0, -1)
                ]);
            $new_tags_forum = '';
        }
        foreach ($news as $item) {
            $tags = explode(',',$item->tag_id);
            foreach ($tags as $tag){
                if($tag !== $id){
                    $new_tags_news = $tag.','.$new_tags_news;
                }
            }
            DB::table('news')
                ->where('id',$item->id)
                ->update([
                    'tag_id' => mb_substr($new_tags_news, 0, -1)
                ]);
            $new_tags_news = '';
        }
        DB::table('tag_name')
            ->where('id',$id)
            ->delete();
        return redirect()->route('admin-tags-index');
    }

}
