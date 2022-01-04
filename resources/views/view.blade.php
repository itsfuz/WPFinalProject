@extends('layout.master')

@section('content')

<main>
    <br>
    <h1 style="text-align:center">View Furniture</h1>

    {{-- view each furniture --}}

    <div class="row" style="padding: 50px; justify-content:center">

            @foreach ($furnitures as $f)
            <div class="col-5" style="width:300px; height:500px">
                <div class="card" style="border-style:solid; align-items:center">

                    <div style="padding: 20px">
                        <p>Name: {{$f->name}}</p>
                        <p>Price: Rp. {{$f->price}}</p>
                        <p>Image:  </p>
                        <img src=" {{ asset($f->images) }}" alt="">

                        {{-- if admin --}}
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
                    </div>
                </div>
            </div>




                    {{-- if user --}}
                    {{-- <div class="row">
                        <div class="column">
                            <form action="">
                                <button type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div> --}}


        <br>
        @endforeach
    </div>



        {{-- ini yang ditunjukin dari lab --}}
        {{-- <tr>
            <td  class="furniture-table">
                <img src="{{Storage::url($f->image)}}" alt="">

    {{-- for validation error --}}
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


