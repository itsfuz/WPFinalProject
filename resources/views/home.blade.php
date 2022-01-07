@extends('layout.master')


@section('content')
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

<div class="row" style="padding: 50px; justify-content:center">

        @foreach ($furnitures as $f)
        <div class="col-5" style="width:300px; height:500px">
            <div class="card" style="border-style:solid; align-items:center">

                <div style="padding: 20px">
                    <p>Name: {{$f->name}}</p>
                    <p>Price: Rp. {{$f->price}}</p>
                    <p>Image:  </p>
                    <img src=" {{ Storage::url($f->image) }}" alt="" width="100px;" height="100px;">

                    @auth
                    @if(auth()->user()->role == 'member')
                    <div class="row">
                        <div class="column">
                            <form action="" style="width:100px">
                                <a href="/login"> <button type="button" class="btn btn-secondary">Add to Cart</button></a>
                            </form>
                        </div>
                    </div>
                @elseif(auth()->user()->role == 'admin')
                    <div class="row">
                        <div class="column">
                            <form action="">
                                <button type="submit">Update</button>
                            </form>
                        </div>

                        <div class="column">
                            <form action="">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>

                    @endif
                    @else
                    <div class="row">
                        <div class="column">
                            <a href="/login"> <button type="button" class="btn btn-primary" style="width:150px">Add to Cart</button></a>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    <br>
    @endforeach
</div>

<div>
    @if($errors->any())
        @foreach ($errors as $error)
        <i>{{$errors}}</i>
        <br>
        @endforeach
    @endif
</div>



@endsection
