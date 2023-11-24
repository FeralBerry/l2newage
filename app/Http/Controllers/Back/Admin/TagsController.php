<?php

namespace App\Http\Controllers\Back\Admin;



use App\Models\Forum;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends AdminBaseController
{
    public function index()
    {
        $tags = DB::table('tag_name')
            ->paginate(30);
        $data = array_merge($this->data(),[
            'tags' => $tags
        ]);
        return view('back.admin.tags.index',$data);
    }
    public function add(Request $request){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.tags.add',$data);
    }
    public function edit(Request $request, $id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.tags.edit',$data);
    }
    public function delete($id){
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
