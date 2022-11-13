<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\auth;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::select('carts.id as id', 'items.img as img', 'carts.count as count', 'items.name as name', 'items.price as price', 'items.model as model')
            ->join('items', 'items.id', 'carts.item')
            ->where('carts.user', Auth::user()->id)
            ->where('carts.status', 'В корзине')
            ->get();

        $cartInfo = Cart::selectRaw('SUM(carts.count) as count, SUM(items.price * carts.count) as sum')
            ->join('items', 'items.id', 'carts.item')
            ->where('carts.user', Auth::user()->id)
            ->where('carts.status', 'В корзине')
            ->first();
        return view('cart', ['cart' => $cart, 'cartInfo' => $cartInfo]);
    }
    public function deleateCart($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->back();
    }
    public function addCart(Request $r)
    {
        $item = Item::find($r->item);
        $cart = Cart::where('item', $r->item)->where('user', Auth::user()->id)
            ->where('status', 'В корзине')
            ->first();
        if (is_null($cart)) {
            if ($item->count > 0) {
                Cart::create([
                    'user' => Auth::user()->id,
                    'item' => $item->id,
                    'count' => '1',
                    'status' => 'В корзине'
                ]);
            } else {
                return response()->json(['cart' => 'noCount'], 400);
            }
        } else {
            if ($cart->count + 1 > $item->count) {
                return response()->json(['cart' => 'noCount'], 400);
            } else {
                $cart->count++;
                $cart->save();
            }
        }

        return response()->json(['cart' => 'success'], 200);
    }
    public function changeCount(Request $r)
    {
        $cart = Cart::select('carts.count as c_count', 'items.count as i_count','items.price as price')
            ->join('items', 'items.id', 'carts.item')
            ->where('carts.id', $r->id)
            ->first();

        switch ($r->type) {
            case 'add':
                if ($cart->c_count + 1 > $cart->i_count) {
                    return response()->json(['cart' => 'noCount'], 400);
                } else {
                    $cart->c_count++;
                }
                break;

            case 'remove':
                if ($cart->c_count - 1 < 1) {
                    return response()->json(['cart' => 'null'], 400);
                } else {
                    $cart->c_count--;
                }
                break;
        }
        Cart::where('id', $r->id) 
        ->update([
            'count' => $cart->c_count
        ]);
        $sum = Cart::selectRaw(' SUM(items.price * carts.count) as sum')
        ->join('items', 'items.id', 'carts.item')
        ->where('carts.user', Auth::user()->id)
        ->where('carts.status', 'В корзине')
        ->first();
        return response()->json([
            'count'=>$cart->c_count,
            'sumItem'=>$cart->c_count * $cart->price,
            'sumCart'=>$sum->sum 

        ], 200);
    }


    public function ordering(Request $r){
        $validator = Validator::make($r->all(), [
            'password' => 'required|current_password',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $order = Order::create([
            'user' =>Auth::user()->id,
            'status'=>'Новый'
        ]);
        // Cart::where('status', 'В корзине')
        // ->where('user', Auth::user()->id)
        // ->update([
        //     'order'=>$order->id,
        //     'status'=>'Заказан'
        // ]);
       $cart=Cart::where('status', 'В корзине')
        ->where('carts.user', Auth::user()->id)
        ->get();
        foreach($cart as $c){
            $c->order = $order->id;
            $c->status='Заказан';
            $item=Item::find($c->item);
            $item->count = $item->count - $c->count;
            $item->save();
            $c->save();
        }
        return response()->json(['orderIn' => 'success'], 200);
    }
}
