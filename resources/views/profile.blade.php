@extends('layout.master')

@section('content')
<h1>(Blank) Profile</h1>

<h3>Full Name</h3>
<h3>Email</h3>
<h3>Address</h3>
<h3>Gender</h3>
<h3>Role</h3>
{{-- if admin then this --}}
<div class="row">
    <div class="column">
        <form action="">
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
