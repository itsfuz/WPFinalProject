<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function GoToCheckOut($id){

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

    public function createTransaction(Request $request){

        $userID = auth()->user()->id;

        $Transaction = new Transaction();

        $Transaction->users_id = $userID;
        $Transaction->method = $request->method;
        $Transaction->date = date('d');
        $Transaction->card_number = $request->card_number;

        $Transaction->save();

        $TransactionDetail = new TransactionDetail();

        $TransactionDetail->transaction_id = $Transaction->id;

    }

}
