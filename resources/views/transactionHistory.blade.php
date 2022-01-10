@extends('layout.master')

@section('content')
<br>
<h1>Transaction History</h1>
<div class="container" style="padding: 30px; text-align:center">

@auth

    @if (Auth::check())
        <br>
        <h1>Welcome, {{auth()->User()->full_name}}</h1><br>
        <h1>to JH Furniture</h1>

    @endif
    @else
        <br>
        <h1>Welcome to JH Furniture</h1>
@endauth

   <div class="card">
    <table class="table">
        <thead>
            @foreach ($Transactions as $Transaction)
                {{$TotalCost = 0}}
                <h6>Transaction id: {{$Transaction->id}}</h6>
                <h6>Transaction Date:{{$Transaction->transaction_date}}</h6>
                <h6>Method:{{$Transaction->payment_method}}</h6>
                <h6>Crad Number:{{$Transaction->card_number}}</h6>
                @foreach ($users as $user)
                    @if ($Transaction->users_id == $user->id)
                        <h6>User's Name: {{$user->full_name}}</h6>
                    @endif

                @endforeach

                <tr>
                    <th scope="col">Furniture's Name</th>
                    <th scope="col">Furniture's Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price for Each Furniture</th>
                </tr>
        </thead>
        <tbody>

                @foreach ($TransactionDetails as $TransactionDetail)

                    @if($Transaction->id == $TransactionDetail->transactions_id)
                        @foreach ($furnitures as $furniture)

                            @if ($TransactionDetail->furnitures_id == $furniture->id)
                                <tr>
                                    <th scope="row">{{$furniture->name}}</th>
                                    <td>{{$furniture->price}}</td>
                                    <td>{{$furniture->quantity}}</td>
                                    <td>{{$furniture->price*$furniture->quantity}}</td>
                                </tr>
                                {{$TotalCost = $TotalCost + ($furniture->price*$furniture->quantity)}}
                            @endif

                        @endforeach

                        <tr>
                            <td colspan="2">Total Price</td>
                            <td>{{$TotalCost}}</td>
                        </tr>

                    @endif

        </tbody>
                @endforeach

            @endforeach
      </table>

   </div>

</div>



@endsection
