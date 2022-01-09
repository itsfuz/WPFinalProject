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
        @foreach ($furnitures as $f)
        <tr>
            <th scope="col"> {{$f->iamge}}</th>
            <th scope="col"> {{$f->name}}</th>
            <th scope="col"> {{$f->price}}</th>
            <th scope="col"> </th>
            <th scope="col"> price x quantity </th>
            {{-- button --}}
            <th scope="col"> </th>
        </tr>
        @endforeach


  </table>

@endsection
