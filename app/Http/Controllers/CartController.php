<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Furniture;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function viewCart(){

        foreach()

        return view('cart');
    }

    public function addToCart($id){

        $cart = new CartItem();

        $cart->users_id = auth()->user()->id;

        $item = Furniture::find($id);

        $cart->furnitures_id = $item;



        return redirect()->back();
    }
}
