@extends('layout.master')

@section('content')
<h1>{{auth()->user()->full_name}}'s Profile</h1>

<h3>Full Name: {{auth()->user()->full_name}}</h3>
<h3>Email: {{auth()->user()->email}}</h3>
<h3>Address: {{auth()->user()->address}}</h3>
<h3>Gender: {{auth()->user()->gender}}</h3>
<h3>Role: {{auth()->user()->role}}</h3>
{{-- if admin then this --}}
<div class="row">
    <div class="column">
        <form action="/logout">
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="column">
        <form action="">
            <button type="submit">View All User's Transaction</button>
        </form>
    </div>

    <div class="column">
        <form action="">
            <button type="submit">Update Profile</button>
        </form>
    </div>
</div>


{{-- if user then this --}}
{{-- <div class="row">
    <div class="column">
        <form action="">
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="column">
        <form action="">
            <button type="submit">View Transaction History</button>
        </form>
    </div>

    <div class="column">
        <form action="">
            <button type="submit">Update Profile</button>
        </form>
    </div>
</div> --}}
@endsection
