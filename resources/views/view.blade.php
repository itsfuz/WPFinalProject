@extends('layout.master')

@section('content')

@if (session()->has('notification'))
    <div class="box" style="display:flex; align-item:center; justify-content:center">
        <div class="alert alert-secondary" role="alert" style="width:500px; text-align:center">
            {{ session('notification') }}
        </div>
    </div>
@endif

<main>
    <br>
    <h1>View Furniture</h1>

    <div class="row" style="padding: 50px; justify-content:center">

        @auth
        @if (auth()->user()->role == 'member')

        @endif
        @else
        <div class="col-md-3">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder=" Search by Furniture's name">
                <button type="button" class="btn btn-outline-primary">Search</button>
              </div>
        </div>
        <div class="w-100 d-none d-md-block"></div>
        @endauth
          <br>
          <br>

            @foreach ($furnitures as $f)
            <div class="col-5" style="width:300px; height:500px">
                <div class="card  bg-light mb-3" style="border-style:solid; align-items:center">
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
                                <form action="/addToCart/{{$f->id}}" style="width:100px" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" style="width:150px">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    @elseif(auth()->user()->role == 'admin')
                        <div class="row">
                            <div class="column">
                                    <a href="{{url('updateFurniture/'.$f->id)}}"><button class="btn btn-success" type="submit">Update</button></a>
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
</main>



@endsection


