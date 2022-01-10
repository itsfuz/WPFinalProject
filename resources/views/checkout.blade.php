@extends('layout.master')

@section('content')
<br>
<h1>CheckOut</h1>
<div class="container" style="padding: 30px; text-align:center">
    <table class="table">
        <thead class="thead-dark" >
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>

          </tr>
        </thead>
        <tbody>
            <br>
            @foreach ($CartItems as $item)
                @foreach ($furnitures as $furniture)

                    @if ($item->furniture_id == $furniture->id)
                        <th scope="col"><img src="{{Storage::url($furniture->image)}}" alt="{{$furniture->name}}" style="padding: 2px; width:270px;"></th>
                        <th scope="col" > {{$furniture->name}}</th>
                        <th scope="col"> {{$furniture->price}}</th>
                        <th scope="col"> {{$item->quantity}}</th>
                        <th scope="col"> {{$item->total_price}}</th>
                        <th scope="col"> </th>

                    </tr>
                    @endif

                @endforeach
            @endforeach
      </table>

      <br>
    <div style="text-align: center; font-size:20px">
        <p><b>Total:</b> Rp.<?php echo $TotalCost ?></p>
    </div>
    <form action="/getTransaction" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-4 @error('payment_method') is-invalid @enderror" style="text-align: center">
                <label for="payment_method" class="col-md-4 col-form-label text-md-end"><b>{{ __('Payment Method') }}</b>:</label>
            </div>
            <br>
            <div class="col-md-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="Credit">
                    <label class="form-check-label" for="payment_method">Credit</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="Debit">
                    <label class="form-check-label" for="payment_method">Debit</label>                    </div>
                </div>
                @error('payment_method')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-check-label" for="card_number"><b>Card Number:</b></label>
                </div>
                <div class="col-md-4">
                    <input type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror" id="card_number">
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
</div>



@endsection
