<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\auth;
use App\Models\Item;

class CartController extends Controller
{
    public function cart(){
        $cart = Cart::select('carts.id as id', 'items.img as img', 'carts.count as count', 'items.name as name', 'items.price as price', 'items.model as model')
        ->join('items', 'items.id', 'carts.item')
        ->where('carts.user', Auth::user()->id)
        ->where('carts.status', 'В корзине')
        ->get();

    $cartInfo = Cart::selectRaw('SUM(carts.count) as count, SUM(items.price * carts.count) as sum')
    ->join('items','items.id','carts.item')
    ->where('carts.user', Auth::user()->id)
    ->where('carts.status', 'В корзине')
    ->first();
    return view('cart', ['cart' => $cart, 'cartInfo'=> $cartInfo]);
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

        return response()->json(['cart' => 'success'], 400);
    }
}
