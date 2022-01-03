@extends('layout.master')

@section('content')
<body>
    <br>
    <h1 style="text-align:center">View Furniture</h1>

    {{-- view each furniture --}}

    <div class="view-card" style="padding:50px; width:500px">


    @foreach ($furnitures as $f)
    <div class="card" style="border-style:solid; align-items:center; display:flex">

       <div style="padding: 20px">
        <p>Name: {{$f->name}}</p>
        <p>Price: Rp. {{$f->price}}</p>
        <p>Color: {{$f->color}}</p>
        <p>Type: {{$f->type}}</p>
        <p>Image:  </p>
        <img src=" {{Storage::url($f->images)}}" alt="">

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

</body>

@endsection


