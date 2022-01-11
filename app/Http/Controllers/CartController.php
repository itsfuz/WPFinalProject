<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function viewCart($id){

        $CartItems = Cart::where('users_id', $id)->get();

        $furnitures = Furniture::all();
        $TotalCost = 0;
        foreach($CartItems as $item){

            $TotalCost = $TotalCost + $item->total_price;
        }

        return view('/cart', compact('CartItems', $CartItems))
        ->with('TotalCost', $TotalCost)
        ->with('furnitures', $furnitures)
        ->with('notification', 'Item Added to Cart!');
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

        return redirect()->back()->with('notification', 'Item Added to Cart!');
    }

    public function addQuantity($id){

        $user = Auth()->user()->id;

        $SelectedItem = Cart::where('users_id', $user)->where('furniture_id', $id)->first();

        $item = Furniture::find($id);

        $SelectedItem->quantity = $SelectedItem->quantity + 1;

        $SelectedItem->total_price = $SelectedItem->total_price + $item->price;

        $SelectedItem->save();

        return redirect()->back();

    }

    public function minusQuantity($id){

        $user = Auth()->user()->id;

        $SelectedItem = Cart::where('users_id', $user)->where('furniture_id', $id)->first();

        if($SelectedItem->quantity - 1 == 0){

            $SelectedItem->delete();
        }
        else{
            $SelectedItem->quantity = $SelectedItem->quantity - 1;
            $item = Furniture::find($id);

            $SelectedItem->total_price = $SelectedItem->total_price - $item->price;
            $SelectedItem->save();
        }

        return redirect()->back();
    }
}
