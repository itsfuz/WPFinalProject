@extends('layout.master')

@section('content')

<h1>Cart</h1>
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

                    {{-- button --}}
                    <th scope="col"> </th>
                </tr>
                @endif

            @endforeach

        @endforeach


  </table>

  <?php echo $TotalCost ?>

@endsection
