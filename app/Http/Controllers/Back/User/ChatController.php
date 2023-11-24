<?php

namespace App\Http\Controllers\Back\User;


use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChatController extends Controller
{
    public function index($id)
    {
        $messages = Chat::all();
        $users = User::all();
        $data = array_merge($this->data(),
            [
                'messages' => $messages,
                'users' => $users,
                'chat_id' => $id,
            ]);
        return view('back.users.chat',$data);
    }
    public function message(Request $request){
        DB::table('chat')
            ->insert([
                'user_id' => $request['user_id'],
                'message' => $request['message'],
                'room_id' => $request['room_id'],
            ]);
        $data = [
            'room_id' => $request['room_id'],
            'message' => $request['message'],

        ];
        return $data;
    }
}
