<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function createTransaction($payment_method, $card_number){

    }

    public function checkOut($id){

        $CartItems = Cart::where('users_id', $id)->get();

        $furnitures = Furniture::all();
        $TotalCost = 0;
        foreach($CartItems as $item){

            $TotalCost = $TotalCost + $item->total_price;
        }

        return view('checkout', compact('CartItems', $CartItems))
        ->with('TotalCost', $TotalCost)
        ->with('furnitures', $furnitures)
        ->with('notification', 'Item Added to Cart!');
    }

}
