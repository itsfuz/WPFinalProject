@extends('layout.master')

@section('content')

<div class="container">
    <div class="container-header">
        <h2>Register</h2>
    </div>

    <div class="container-content">
        <form action="/register" method="POST">

            @csrf
            <div class="row mb-3">
            <label for="email">Email </label>
                <div class="col-md-6">
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
            </div>

            <br>
            <div class="row mb-3">
                <label for="password">Password </label>
                <div class="col-md-6">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
            </div>

            <br>
            <div class="row mb-3">
                <label for="conf-password">Confirm Passowrd </label>
                <div class="col-md-6">
                    <input type="conf-password" name="conf-password" id="conf-password" placeholder="Confirm Password">

                </div>
            </div>


            <br>
            <button>Register</button>

        </form>
    </div>
</div>

@endsection
