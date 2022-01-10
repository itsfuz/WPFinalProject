<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
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

            $furniture = Furniture::find($item->furniture_id);

            $TransactionDetail->furniture_name = $furniture->name;

            $TransactionDetail->price = $furniture->price;

            $TransactionDetail->quantity = $item->quantity;

            $TransactionDetail->total_price = $furniture->price*$item->quantity;

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

        if($Transactions == null){

            return redirect('transactionHistory');
        }
        else{

            $TransactionDetails = TransactionDetail::all();
            $users = User::all();



            return view('history')
            ->with('Transactions', $Transactions)
            ->with('TransactionDetails', $TransactionDetails)
            ->with('users', $users);
        }


    }

    public function UserTransactionHistory(){

        $userID = auth()->user()->id;

        $Transactions = Transaction::where('users_id', $userID)->get();

        $TransactionDetails = TransactionDetail::all();

        $furnitures = Furniture::all();

        return view('history')
        ->with('Transactions', $Transactions)
        ->with('TransactionDetails', $TransactionDetails);
    }

}
