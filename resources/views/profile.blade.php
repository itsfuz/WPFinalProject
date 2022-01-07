@extends('layout.master')

@section('content')

<h1> {{auth()->User()->full_name}}'s Profile</h1>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5><b>Full Name:</b></h5>
        </div>
        <div class="col-md-2">
            <h5>{{auth()->User()->full_name}}</h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5><b>Email:</b></h5>
        </div>
        <div class="col-md-2">
            <h5>{{auth()->User()->email}}</h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5><b>Address:</b></h5>
        </div>
        <div class="col-md-2">
            <h5>{{auth()->User()->address}}</h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5><b>Gender:</b></h5>
        </div>
        <div class="col-md-2">
            <h5>{{auth()->User()->gender}}</h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5><b>Role:</b></h5>
        </div>
        <div class="col-md-2">
            <h5>{{auth()->User()->role}}</h5>
        </div>
    </div>
    <br>
    <br>

    @auth

    @if (auth()->User()->role == 'admin')
    <div class="row justify-content-center">
        <div class="col-md-2">
            <form action="logout">
                <button type="submit">Logout</button>
            </form>
        </div>

        <div class="col-md-3">
            <form action="">
                <button type="submit">View All User's Transaction</button>
            </form>
        </div>

        <div class="col-md-2">
            <form action="">
                <a href="updateProfile"> <button type="button">Update Profile</button></a>
            </form>
        </div>
    </div>
    @elseif (auth()->User()->role == 'member')
    <div class="row">
        <div class="col-md-2">
            <form action="">
                <button type="submit">Logout</button>
            </form>
        </div>
        <div class="col-md-3">
            <form action="">
                <button type="submit">View Transaction History</button>
            </form>
        </div>
        <div class="col-md-2">
                <a href="/updateProfile"><button type="button">Update Profile</button></a>
        </div>
    </div>
    @endif
    @endauth
    <br>
</div>

@endsection
