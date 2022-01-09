@extends('layout.master')

@section('content')

<h1>Cart</h1>
<div class="container" style="padding: 30px; text-align:center">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <br>
            @foreach ($CartItems as $item)
                @foreach ($furnitures as $furniture)

                    @if ($item->furniture_id == $furniture->id)
                    <tr>
                        <th scope="col"><img src="{{Storage::url($furniture->image)}}" alt="{{$furniture->name}}" style="padding: 2px; width:270px;"></th>
                        <th scope="col"> {{$furniture->name}}</th>
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
]
      <div class="row align-items-center">
        <div class="col-md-3 @error('paymentMethod') is-invalid @enderror" style="text-align: center">
            <label for="paymentMethod" class="col-md-4 col-form-label text-md-end">{{ __('Payment Method') }}:</label>
        </div>
        <br>
        <div class="col-md-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod" value="Credit">
                <label class="form-check-label" for="gender">Credit</label>
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod" value="Debit">
                <label class="form-check-label" for="gender">Debit</label>
              </div>
        </div>
        @error('gender')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row">
        <div class="col">
            <p>Card Number</p>
        </div>
        <div class="col">
            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="Full Name" value="{{ old('full_name') }}">
        </div>
    </div>


      <br><br>
      <a href="/checkout"> <button type="button" class="btn btn-primary">Checkout</button></a>
</div>


@endsection
