<?php

namespace App\Http\Controllers\Back\Admin;


use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends AdminBaseController
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = DB::table('users')
            ->paginate(50);
        $data = array_merge($this->data(),[
            'users' => $users
        ]);
        return view('back.admin.users.index',$data);
    }
    public function add(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->isMethod("post")){
            $array = [
                "name" => $request["name"],
                "email" => $request["email"],
                "password" => $request["password"]];
            RegisterController::class->create($array);
            return redirect()->route("admin-users-index");
        }
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.users.add',$data);
    }
    public function edit(Request $request, $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = DB::table("users")
            ->where('id',$id)
            ->get();
        if ($request->isMethod("post")){
            if($request["password"] == ""){
                DB::table("users")
                    ->where("id",$id)
                    ->update([
                        'name' => $request["name"],
                        'email' => $request["email"],
                    ]);
            } else {
                DB::table("users")
                    ->where("id",$id)
                    ->update([
                        'name' => $request["name"],
                        'email' => $request["email"],
                        'password' => Hash::make($request['password']),
                    ]);
            }
            return redirect()->route("admin-users-index");
        }
        $data = array_merge($this->data(),[
            'id' => $id,
            'user' => $user
        ]);
        return view('back.admin.users.edit',$data);
    }
    public function delete($id): RedirectResponse
    {
        DB::table("news")
            ->where("user_id",$id)
            ->delete();
        DB::table("forum_posts")
            ->where("user_id",$id)
            ->delete();
        DB::table("cart")
            ->where("user_id",$id)
            ->delete();
        $forum = DB::table("forum")
            ->where("user_id",$id)
            ->select(['id'])
            ->get();
        foreach ($forum as $item){
            DB::table("forum_posts")
                ->where("forum_id",$item->id)
                ->delete();
        }
        DB::table("forum")
            ->where("user_id",$id)
            ->delete();
        return redirect()->route('admin-users-index');
    }

}
