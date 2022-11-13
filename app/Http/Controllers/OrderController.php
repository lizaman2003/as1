<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

use Illuminate\Support\Facades\auth;

class OrderController extends Controller
{
    public function myOrders()
    {
        $myOrders = Order::selectRaw('orders.id as id, orders.created_at as date, SUM(carts.count) as count, orders.status as status')
            ->join('carts', 'carts.order', 'orders.id')
            ->where('orders.user', Auth::user()->id)
            ->groupBy('id', 'date', 'status')
            ->orderBy('orders.created_at', 'desc')
            ->get();
        return view('myorders', ['myOrders' => $myOrders]);
    }
    public function deleteOrder($id)
    {
        Cart::where('order', $id)->delete();
        Order::where('id', $id)->delete();
        return redirect()->back();
    }
}
