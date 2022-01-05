@extends('layout.master')

@section('content')

<main>
    <br>
    <h1 style="text-align:center">View Furniture</h1>

    <div class="row" style="padding: 50px; justify-content:center">

            @foreach ($furnitures as $f)
            <div class="col-5" style="width:300px; height:500px">
                <div class="card" style="border-style:solid; align-items:center">

                    <div style="padding: 20px">
                        <p>Name: {{$f->name}}</p>
                        <p>Price: Rp. {{$f->price}}</p>
                        <p>Image:  </p>
                        <img src=" {{ asset($f->images) }}" alt="">

                        @auth
                        @if(auth()->user()->role == 'member')
                        <div class="row">
                            <div class="column">
                                <form action="" style="width:100px">
                                    <a href="/login"> <button>Add to Cart</button></a>
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
                                <a href="/login"> <button style="width:100px">Add to Cart</button></a>
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


