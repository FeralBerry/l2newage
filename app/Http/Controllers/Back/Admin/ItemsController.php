<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends AdminBaseController
{
    private $path = "front/img/item";
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
    public function addGet(){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.items.add',$data);
    }
    public function addPost(Request $request){
        $img_name = '';
        $name = $request['name'];
        $item_game_id = $request['item_game_id'];
        $type = $request['type'];
        if ($request->hasFile('img')) {
            $img_name = $this->fileMove($request->file('img'),$this->path."/".$type);
        }
        $recipe_number = $request['recipe_number'];
        $fallout_number = $request['fallout_number'];
        $specifications_id = $request['specifications_id'];
        DB::connection('mysql')
            ->table('specifications')
            ->insert([
                   'id' => $specifications_id
                ]
            );
        $game_price = $request['game_price'];
        $description = $request['description'];
        $temporary = $request['temporary'];
        $this->dbItem()
            ->insert([
                'name' => $name,
                'description' => $description,
                'type' => $type,
                'img' => $img_name,
                'temporary' => $temporary,
                'item_game_id' => $item_game_id,
                'recipe_number' => $recipe_number,
                'specifications_id' => $specifications_id,
                'fallout_number' => $fallout_number,
                'game_price' => $game_price,
            ]);
        return redirect()->route('admin-items-index');
    }
    public function editGet($id){
        $items = $this->dbItem($id)->get();
        $data = array_merge($this->data(),[
            'id' => $id,
            'items' => $items,
        ]);
        return view('back.admin.items.edit',$data);
    }
    public function editPost(Request $request, $id){
        $items = $this->dbItem($id)->get();
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
        return redirect()->route('admin-items-index');
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
    public function characteristic($id){
        $specifications = DB::connection('mysql')
            ->table('specifications')
            ->where('id',$id)
            ->get();
        $data = array_merge($this->data(),[
            'id' => $id,
            'specifications' => $specifications,
        ]);
        return view('back.admin.items.specifications',$data);
    }
    public function editCharacteristic(Request $request, $id){
        DB::connection('mysql')
            ->table('specifications')
            ->where('id',$id)
            ->update([
                'p_def' => $request['p_def'],
                'm_def' => $request['m_def'],
                'p_atk' => $request['p_atk'],
                'm_atk' => $request['m_atk'],
                'weight' => $request['weight'],
                'ss' => $request['ss'],
                'bss' => $request['bss'],
                'quest' => $request['quest'],
            ]);
        return redirect()->route('admin-items-index');
    }

}
