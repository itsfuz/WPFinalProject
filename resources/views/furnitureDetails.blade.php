@extends('layout.master')

@section('content')


<div class="container" style="padding:50px">

    <h1>{{$f->name}}</h1>
    <br><br>
    <div class="" style="x">
        <div class="row justify-content-end">
            <div class="col-md-5">
                <img class="card-img-top" src="{{ Storage::url($f->image) }}" alt="Furniture Image" style="width:300px">
            </div>
                <div class="col-sm-2">
                    <p><b>Name :</b></p>
                    <p><b>Price :</b></p>
                    <p><b>Color :</b></p>
                    <p><b>Type :</b></p>
                </div>
                <div class="col-md-4" style="text-align: left">
                    <p>{{$f->name}}</p>
                    <p>Rp. {{$f->price}}</p>
                    <p>{{$f->color}}</p>
                    <p>{{$f->type}}</p>
                </div>

        </div>
    </div>
    <br><br>
    <div class="row">
        <div style="padding: 20px;">
        @auth
        @if(auth()->user()->role == 'member')
            <div class="row justify-content-center">
                <div class="col-sm-2">
                    <form action="">
                        <a href="/login"> <button type="button" class="btn btn-secondary">Previous</button></a>
                    </form>
                </div>
                <div class="col-sm-2">

                    <form action="/addToCart/{{$f->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        @elseif(auth()->user()->role == 'admin')
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <form action="">
                        <button class="btn btn-secondary" type="submit">Previous</button>
                    </form>
                </div>
                <div class="col-md-auto">
                        <a href="{{url('updateFurniture/'.$f->id)}}"><button class="btn btn-success" type="submit">Update</button></a>
                </div>
                <div class="col-md-auto">
                    <form action="/deleteFurniture/{{$f->id}}" method="POST">
                        {{method_field('delete')}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

            @endif
            @else
            <div class="row justify-content-center">
                <div class="col-sm-2">
                    <form action="">
                        <a href="/login"> <button type="button" class="btn btn-secondary">Previous</button></a>
                    </form>
                </div>
                    <div class="col-sm-2">
                        <a href="/login"> <button type="button" class="btn btn-primary" style="width:150px">Add to Cart</button></a>
                    </div>
            </div>
            @endauth
        </div>
    </div>



    <div>
        @if($errors->any())
            @foreach ($errors as $error)
            <i>{{$errors}}</i>
            <br>
            @endforeach
        @endif
    </div>
</div>



@endsection
