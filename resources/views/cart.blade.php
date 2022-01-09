@extends('layout.master')

@section('content')
<br>
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
                        <th scope="col">
                            <button type="button">-</button>
                            <button type="button">+</button>
                        </th>


                    </tr>
                    @endif

                @endforeach

            @endforeach
      </table>
      <br>
      <div style="text-align: center; font-size:20px">
        <p><b>Total:</b> Rp.<?php echo $TotalCost ?></p>
      </div>
      <br><br>

      <a href="/checkOut/{{auth()->user()->id}}"> <button type="button" class="btn btn-primary">Proceed to Checkout</button></a>
</div>


@endsection
