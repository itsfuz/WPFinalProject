@extends('layout.master')


@section('content')
@auth
    <h1>Welcome, {{auth()->User()->full_name}}</h1><br>
    <h1>to JH Furniture</h1>
@endauth




@endsection
