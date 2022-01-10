@extends('layout.master')

@section('content')
<br>
<h1>Transaction History</h1>
<div class="container" style="padding: 30px; text-align:center">


   <div class="card">
    <table class="table">
            <thead>
            @foreach ($Transactions as $Transaction)
                <?php $TotalCost = 0 ?>
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

                        <tr>
                            <th scope="row">{{$TransactionDetail->furniture_name}}</th>
                            <td>{{$TransactionDetail->price}}</td>
                            <td>{{$TransactionDetail->quantity}}</td>
                            <td>{{$TransactionDetail->price*$TransactionDetail->quantity}}</td>
                        </tr>

                        <?php $TotalCost = $TotalCost + ($TransactionDetail->price*$TransactionDetail->quantity) ?>

                    @endif


                @endforeach

                <tr>
                    <td colspan="2">Total Price</td>
                    <td>{{$TotalCost}}</td>
                </tr>

            @endforeach
        </tbody>



      </table>

   </div>

</div>



@endsection
