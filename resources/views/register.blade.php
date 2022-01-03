@extends('layout.master')

@section('content')

<div class="container">
    <div class="container-header">
        <h2>Register</h2>
    </div>

    <div class="container-content">
        <form action="/register" method="POST">

            @csrf

            <label for="email">Email </label>
            <input type="email" name="email" id="email" placeholder="Email">

            <label for="email">Password </label>
            <input type="password" name="password" id="password" placeholder="Password">

            <button>Register</button>

        </form>
    </div>
</div>

@endsection
