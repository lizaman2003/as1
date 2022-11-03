<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Item;

class CatalogController extends Controller
{
    public function catalog($id = 0)
    {
        $catigories = Cat::all();
        if($id ==0){
            $items = Item::where('count','>','0')->orderBy('created_at', 'desc')->get();
        }
        else{
            $items = Item::where('category', $id)->where('count','>','0')->orderBy('created_at', 'desc')->get();
        }
        return view('main', ['
        catigories' => $catigories, 'item' => $items]);
    }
    public function sorting(Request $r){
   
$items =Item::when($r->cateqory,function($query,$category){
 if($category !==0){
    $query->where('category',$category);
 }
})->orderBy($r->type, 'asc')
       }

    }
