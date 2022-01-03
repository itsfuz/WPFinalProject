@extends('layouts.master')

@section('content')
{{-- connect by id from the view blade?? --}}
<h1>{{$f->name}}</h1>

<p>Image:  </p>
<img src=" {{Storage::url($f->images)}}" alt="">

<p>Price: Rp. {{$f->price}}</p>
<p>Color: {{$f->color}}</p>
<p>Type: {{$f->type}}</p>


@endsection
