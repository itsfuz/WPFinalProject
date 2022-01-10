@extends('layout.master')

@section('content')
<br>
<h1>Transaction History</h1>
<div class="container" style="padding: 30px; text-align:center">

    @if (auth()->user()->role == 'admin')
    @foreach ($Transactions as $Transaction)
    <div class="card">
        <table class="table">
            <br>
                <thead>
                    <div style="padding-left: 50px; text-align: left">
                        <?php $TotalCost = 0 ?>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Transaction ID:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6> {{$Transaction->id}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Transaction Date:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->transaction_date}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Method:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->payment_method}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Card Number:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->card_number}}</h6>
                            </div>
                        </div>

                        @foreach ($users as $user)
                            @if ($Transaction->users_id == $user->id)
                            <div class="row">
                                <div class="col-md-2">
                                    <h6><b>User's Name:</b></h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>{{$user->full_name}}</h6>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>


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
                                <td>Rp. {{$TransactionDetail->price}}</td>
                                <td>{{$TransactionDetail->quantity}}</td>
                                <td>Rp. {{$TransactionDetail->price*$TransactionDetail->quantity}}</td>
                            </tr>

                            <?php $TotalCost = $TotalCost + ($TransactionDetail->price*$TransactionDetail->quantity) ?>

                        @endif


                    @endforeach
                    <br>
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Price</b></td>
                            <td><b>Rp. {{$TotalCost}}</b></td>
                        </tr>
                    </thead>



            </tbody>
          </table>
       </div>
       <br><br>
       @endforeach

    @elseif (auth()->user()->role == 'member')
    @foreach ($Transactions as $Transaction)
    <div class="card">
        <table class="table">
            <br>
                <thead>
                    <div style="padding-left: 50px; text-align: left">
                        <?php $TotalCost = 0 ?>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Transaction ID:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6> {{$Transaction->id}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Transaction Date:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->transaction_date}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Method:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->payment_method}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h6><b>Card Number:</b></h6>
                            </div>
                            <div class="col-md-2">
                                <h6>{{$Transaction->card_number}}</h6>
                            </div>
                        </div>
                    </div>


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
                                <td>Rp. {{$TransactionDetail->price}}</td>
                                <td>{{$TransactionDetail->quantity}}</td>
                                <td>Rp. {{$TransactionDetail->price*$TransactionDetail->quantity}}</td>
                            </tr>

                            <?php $TotalCost = $TotalCost + ($TransactionDetail->price*$TransactionDetail->quantity) ?>

                        @endif


                    @endforeach
                    <br>
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Price</b></td>
                            <td><b>Rp. {{$TotalCost}}</b></td>
                        </tr>
                    </thead>



            </tbody>
          </table>
       </div>
       <br><br>
       @endforeach
    @endif

</div>



@endsection
