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
        $Transaction->payment_method = $request->payment_method;
        $Transaction->transaction_date = date('Y-m-d');
        $Transaction->card_number = $request->card_number;

        $Transaction->save();

        $TDItems = Cart::where('users_id', $userID)->get();

        foreach($TDItems as $item){

            $TransactionDetail = new TransactionDetail();

            $TransactionDetail->transactions_id = $Transaction->id;

            $TransactionDetail->furnitures_id = $item->furniture_id;

            $TransactionDetail->save();

        }

        $ItemToRemove = Cart::where('users_id', $userID)->first();

        while($ItemToRemove != null){

            $ItemToRemove->delete();

            $ItemToRemove = Cart::where('users_id', $userID)->first();
        }

        return redirect('/')->with('notification', 'Purchase Complete!');;

    }

    public function adminTransactionHistory(){

        $Transactions = Transaction::all();

        $TransactionDetails = TransactionDetail::all();

        return redirect('transactionHistory')
        ->with('Transactions', $Transactions)
        ->with('TransactionDetails', $TransactionDetails);
    }

}
