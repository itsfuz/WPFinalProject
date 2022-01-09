@extends('layout.master')


@section('content')

@if (session()->has('notification'))
    <div class="box" style="display:flex; align-item:center; justify-content:center">
        <div class="alert alert-secondary" role="alert" style="width:500px; text-align:center">
            {{ session('notification') }}
        </div>
    </div>
@endif

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
            <div class="card bg-light mb-3" style="border-style:solid; align-items:center">
                <a href="/furnitureDetails/{{$f->id}}"><img class="card-img-top"  src="{{ Storage::url($f->image) }}" alt="Furniture Image" style="padding: 2px; width:270px;"></a>
                <div style="padding: 20px">
                    <br>
                    <p>Name: {{$f->name}}</p>
                    <p>Price: Rp. {{$f->price}}</p>
                    <br>
                @auth
                @if(auth()->user()->role == 'member')
                    <div class="row">
                        <div class="column">

                            <form action="/addToCart/{{$f->id}}" method="POST">
                                @csrf
                                <button type="sumbit" class="btn btn-primary" style="width: 150px">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @elseif(auth()->user()->role == 'admin')
                    <div class="row">
                        <div class="column">
                                <a href="{{url('updateFurniture/'.$f->id)}}"><button type="submit" class="btn btn-success">Update</button></a>
                        </div>

                        <div class="column">
                            <form action="/deleteFurniture/{{$f->id}}" method="POST">
                                {{method_field('delete')}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Delete</button>
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
