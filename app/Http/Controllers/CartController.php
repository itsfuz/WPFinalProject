<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Furniture;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function viewCart(){



        return view('cart');
    }

    public function addToCart($id){

        $cartID = CartItem::where('users_id', auth()->user()->id)->get();

        dd($cartID);

        if($cartID == null){

            $cartID = new CartItem();

            $cartID->users_id = auth()->user()->id;

            $itemID = Furniture::find($id);

            $cartID->furniture_id = $itemID;

            $cartID->quantity = 1;

            $cartID->total_price = ($itemID->price*$cartID->quantity);

            // $cartID->save();

        }
        else{

            $itemID = Furniture::find($id);

            $cartID->furnitures_id = $itemID;

            $cartID->quantity = 1;

            $cartID->total_price = ($itemID->price*$cartID->quantity);

            // $cartID->save();
        }

        return redirect()->back();
    }

    public function addQuantity($id){


    }
}
