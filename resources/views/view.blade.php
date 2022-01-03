@extends('layout.master')

@section('content')
<body>
    <h1>this should be where the furniture is</h1>

    {{-- view each furniture --}}

    @foreach ($furnitures as $f)

    <div class="card">
        <img src="" alt="">
        <p>Name: {{$f->name}}</p>
        <p>Price: Rp. {{$f->price}}</p>
        <p>Color: {{$f->color}}</p>
        <p>Type: {{$f->type}}</p>
        <p>Image:  </p>
        <img src=" {{Storage::url($f->images)}}" alt="">

        <form action="">
            <button type="submit">Update</button>
        </form>

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


