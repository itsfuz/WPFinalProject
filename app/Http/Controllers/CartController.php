<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function viewCart(){

        return view('cart');
    }

    public function addToCart($id){


        $user = auth()->user()->id;

        //mengecek item yang dipilih didalam cart
        $findItem = Cart::where('users_id', $user)->where('furniture_id', $id)->first();

        if($findItem){
            //jika ada item yang sama didalam cart
            $itemPrice = Furniture::find($id)->price;

            $findItem->quantity = $findItem->quantity + 1;

            $findItem->total_price = $findItem->quantity*$itemPrice;

            $findItem->save();
        }
        else{
            //jika tidak ada item yang sama didalam cart
            $cart = new Cart();

            $cart->users_id = $user;

            $item = Furniture::find($id);

            $cart->furniture_id = $id;

            $cart->quantity = 1;

            $cart->total_price = ($item->price*$cart->quantity);

            $cart->save();
        }

        return redirect()->back();
    }

    public function addQuantity($id){


    }
}
