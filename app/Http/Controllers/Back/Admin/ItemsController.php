<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends AdminBaseController
{
    private $path = "front/img/shop";
    private function dbItem($id = null){
        if($id == null){
            return DB::table('item');
        } else {
            return DB::table('item')
                ->where('id',$id);
        }
    }
    public function index()
    {
        $items = $this->dbItem()
            ->paginate(100);
        $data = array_merge($this->data(),[
            'items' => $items
        ]);
        return view('back.admin.items.index',$data);
    }
    public function add(Request $request){
        $filter_name = DB::table("filter_name")
            ->get();
        if($request->isMethod("post")){
            $img_name = '';
            if ($request->hasFile('img')) {
                $img_name = $this->fileMove($request->file('img'),$this->path);
            }
            $this->dbItem()
                ->insert([
                    'description' => $request['description'],
                    'name' => $request['name'],
                    'img' => $img_name,
                    'count' => $request['count'],
                    'item_game_id' => $request['id'],
                    'type' => $request['type'],
                ]);
        }
        $data = array_merge($this->data(),[
            'filter_name' => $filter_name
        ]);
        return view('back.admin.items.add',$data);
    }
    public function edit(Request $request, $id){
        $filter_name = DB::table("filter_name")
            ->get();
        $items = $this->dbItem($id)->get();
        if($request->isMethod("post")){
            $img_name = '';
            if ($request->hasFile('img')) {
                $img_name = $this->fileMove($request->file('img'),$this->path);
            } else {
                foreach ($items as $item){
                    $img_name = $item->img;
                }
            }
            $this->dbItem()
                ->update([
                    'description' => $request['description'],
                    'name' => $request['name'],
                    'img' => $img_name,
                    'count' => $request['count'],
                    'item_game_id' => $request['id'],
                    'type' => $request['type'],
                ]);
        }
        $data = array_merge($this->data(),[
            'id' => $id,
            'items' => $items,
            'filter_name' => $filter_name
        ]);
        return view('back.admin.items.edit',$data);
    }
    public function delete($id){
        $this->dbItem($id)
            ->update([
                'closed_sale' => 1,
            ]);
        DB::table("shop")
            ->where('item_id',$id)
            ->update([
                'closed_sale' => 1,
            ]);
        return redirect()->route('admin-items-index');
    }


}
