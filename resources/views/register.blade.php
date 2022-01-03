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

            <br>
            <label for="password">Password </label>
            <input type="password" name="password" id="password" placeholder="Password">

            <br>
            <label for="conf-password">Confirm Passowrd </label>
            <input type="conf-password" name="conf-password" id="conf-password" placeholder="Confirm Password">


            <br>
            <button>Register</button>

        </form>
    </div>
</div>

@endsection
