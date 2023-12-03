<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ForumController extends Controller
{
    private function validateStrings(): array
    {
        $validSTR = [
            'casino',
            'порно',
            'CS',
        ];
        return $validSTR;
    }
    public function add(Request $request){
        $alloy_tag = '<b></b><br><p></p><i></i><sup></sup>';
        $titleValid = false;
        $messageValid = false;
        foreach ($this->validateStrings() as $valid){
            $titleValid = strpos($request['title'],$valid);
            $messageValid = strpos($request['message'],$valid);
        }
        if($titleValid === false || $messageValid === false){
            $title = strip_tags($request['title'],$alloy_tag);
            $message = strip_tags($request['message'],$alloy_tag);
            $tag = '';
            if(!empty($request['tag'])){
                foreach ($request['tag'] as $item){
                    $tag = $item.','.$tag;
                }
            } else {
                $tag = '';
            }
            DB::table('forum')
                ->insert([
                    'title' => $title,
                    'description' => $message,
                    'user_id' => Auth::user()->id,
                    'tag_name_id' => $tag
                ]);
            $forum = Forum::all()
                ->sortByDesc('created_at')
                ->take(1);
            foreach ($forum as $item){
                $forum_id = $item->id;
            }
            DB::table('forum_posts')
                ->insert([
                    'forum_id' => $forum_id,
                    'description' => $message,
                    'user_id' => Auth::user()->id
                ]);
        }
        return redirect()->route('forum-article',$forum_id);
    }
    public function addPost(Request $request, $id, $forum_id){
        $alloy_tag = '<b></b><br><p></p><i></i><sup></sup>';
        $messageValid = false;
        foreach ($this->validateStrings() as $valid){
            $messageValid = strpos($request['message'],$valid);
        }
        if($messageValid === false){
            $message = strip_tags($request['message'],$alloy_tag);
            DB::table('forum_posts')
                ->insert([
                    'forum_id' => $forum_id,
                    'description' => $message,
                    'user_id' => Auth::user()->id
                ]);
        }
        return redirect()->back();
    }
}
