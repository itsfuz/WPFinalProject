@extends('layout.master')

@section('content')

<main>
    <br>
    <h1>View Furniture</h1>

    <div class="row" style="padding: 50px; justify-content:center">

        @auth
        @if (auth()->user()->role == 'member')

        @endif
        @else
        <div class="input-group" style="padding:50px; justify-content:right;">
            <input type="search" class="form-control rounded" placeholder=" Search by Furniture's name">
            <button type="button" class="btn btn-outline-primary">Search</button>
          </div>
        @endauth
          <br>
          <br>

            @foreach ($furnitures as $f)
            <div class="col-5" style="width:300px; height:500px">
                <div class="card  bg-light mb-3" style="border-style:solid; align-items:center">
                    <img class="card-img-top" src="{{ Storage::url($f->image) }}" alt="Furniture Image" style="padding: 2px">
                    <div style="padding: 20px">
                        <br>
                        <p>Name: {{$f->name}}</p>
                        <p>Price: Rp. {{$f->price}}</p>
                        <br>
                        @auth
                        @if(auth()->user()->role == 'member')
                        <div class="row">
                            <div class="column">
                                <form action="/addToCart/{{$f->id}}" style="width:100px" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" style="width:150px">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    @elseif(auth()->user()->role == 'admin')
                        <div class="row">
                            <div class="column">
                                {{-- {{route('update', $f->id)}} --}}
                                <form action="" method="POST">
                                    @method('update')
                                    @csrf
                                    <button class="btn btn-success">Update</button>
                                </form>
                            </div>

                            <div class="column">
                                {{-- {{route('deleteFurniture', $f->id)}} --}}
                                <form action="" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
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
</main>



@endsection


