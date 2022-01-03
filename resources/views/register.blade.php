@extends('layout.master')


@section('content')

<main class="forms">

    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form action="/register" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Fill the Form to Register</h1>

                <div class="form-floating">
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name">
                    <label for="fullname">Full Name</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                  <label for="email">Email</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <label for="password">Password</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" name="confPassword" class="form-control" id="confPassword" placeholder="Confirm Password">
                    <label for="confPassword">Confirm Password</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                    <label for="address">Address</label>
                </div>
                <br>

                {{--butuh radio button untuk gender--}}

                <button class="w-100 btn btn-lg btn-primary" type="submit">Register Account</button>

              </form>
        </div>
    </div>

  </main>

  <br>
  <br>

@endsection
