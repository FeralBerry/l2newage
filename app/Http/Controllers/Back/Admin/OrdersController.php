<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends AdminBaseController
{
    public function index()
    {
        $orders = DB::connection('mysql')
            ->table('orders')
            ->join('shop','shop.id','=','orders.shop_id')
            ->join('yookassa','orders.payment_id','=','yookassa.payment_id')
            ->join('users','users.id','=','orders.user_id')
            ->select('users.name',
                'users.email',
                'orders.count',
                'orders.payment_id',
                'orders.amount',
                'shop.title',
                'yookassa.description'
            )
            ->paginate(50);
        $data = array_merge($this->data(),[
            'orders' => $orders
        ]);
        return view('back.admin.orders.index',$data);
    }
    public function search(Request $request){
        $search = $request['search'];
        $orders = DB::connection('mysql')
            ->table('orders')
            ->join('shop','shop.id','=','orders.shop_id')
            ->join('yookassa','orders.payment_id','=','yookassa.payment_id')
            ->join('users','users.id','=','orders.user_id')
            ->select('users.name',
                'users.email',
                'orders.count',
                'orders.payment_id',
                'orders.amount',
                'shop.title',
                'yookassa.description'
            )
            ->where('yookassa.description','LIKE',"%$search%")
            ->orWhere('users.name', '=',"$search")
            ->orWhere('orders.payment_id', '=',"$search")
            ->paginate(50);
        $data = array_merge($this->data(),[
            'orders' => $orders,
            'msg' => 'Поиск по ' . $search
        ]);
        return view('back.admin.orders.index',$data);
    }
    public function add(Request $request){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.orders.add',$data);
    }
    public function edit(Request $request, $id){
        $data = array_merge($this->data(),[

        ]);
        return view('back.admin.orders.edit',$data);
    }
    public function delete($id){

        return redirect()->route('admin-orders-index');
    }

}
