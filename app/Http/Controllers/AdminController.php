<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin()
    {
        $item = Item::select('id','name','img as img', 'price', 'model')->get();
        return view('admin.admin', ['item' => $item]);
    }
    public function addItemPage()
    {
        $category = Cat::all();
        return view('admin.additem', ['category' => $category]);
    }
    public function addItem(Request $r)
    {
        $photo = Storage::put('public/items', $r->file);
        // Storage::url($photo);
        Item::create([
            'name' => $r->name,
            'img' => Storage::url($photo),
            'price' => $r->price,
            'count' => $r->count,
            'country' => $r->country,
            'model' => $r->model,
            'year' => $r->year,
            'category' => $r->category,
        ]);
        return redirect(route('admin'));
    }
    public function edititemPage($id)
    {
        $category = Cat::all();
        $item = Item::find($id);

        return view('admin.edititem', ['category' => $category, 'item' => $item]);
    }

    public function edititem(Request $r)
    {
        $item = Item::find($r->id);

        $item->name = $r->name;
        $item->model = $r->model;
        $item->year = $r->year;
        $item->country = $r->country;
        $item->price = $r->price;
        $item->category = $r->category;
        if (!is_null($r->file)) {
            $photo = Storage::put('public/items', $r->file);
            $item->img = Storage::url($photo);
        }
        $item->save();
        return redirect(route('admin'));
    }
    public function deleteItem($id)
    {
        Cart::where('item', $id)->delete();
        Item::where('id', $id)->delete();
        return redirect(route('admin'));
    }
    public function ordersPage( Request $r)
    {
        $orders = Order::selectRaw('orders.id as id', 'orders.crated_at as date','users.surname as surname','users.name as name','users.patronymic as patronymic, SUM(cart.count)as count, orders.status as status')
        ->join('users','user.id','ordres.user')
        ->join('carts','carts.order','order.id')
        ->when($r->status, function($query, $sort){
           switch($sort) {

           }
        })
        ->groupBy('id','date','fio','status','name','patronymic','surname')
        ->get();
        return view('admin.orders', ['orders'=> $orders]);
    }

    public function orderPage($id){
        $orders = Order::selectRaw('orders.id as id', 'orders.crated_at as date','users.surname as surname','users.name as name','users.patronymic as patronymic, SUM(cart.count)as count, orders.status as status')
        ->join('users','user.id','ordres.user')
        ->join('carts','carts.order','order.id')
        ->where('orders', 'id')
        ->groupBy('id','date','fio','status','name','patronymic','surname')
        ->first();
        return view('admin.order', []);
    }

    public function selectStatus(Request $r){

        $order = new Order();
        $order=Order::find($r->idOrder);

        $order->status =$r->status;

        if($r->status == 'Отклонен'){}
    }
}
