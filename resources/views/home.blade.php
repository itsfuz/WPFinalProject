@extends('layout.master')

<link rel="stylesheet" href="style.css">

@section('container')

<div class="loginbox">

    <div class="title">User Registration</div>

    <form action="/register" method="POST">

        @csrf

        <label for="email">Email </label>
        <input type="email" name="email" id="email" placeholder="Email">

        <label for="email">Password </label>
        <input type="password" name="password" id="password" placeholder="Password">

        <button>Register</button>

    </form>

</div>
