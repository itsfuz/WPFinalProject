@extends('layout.master')


@section('content')

<main class="forms">

    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form method="POST">
                <h1 class="h3 mb-3 fw-normal">Please Sign-in</h1>
                @csrf
                <div class="form-floating">
                  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com")>
                  <label for="floatingInput">Email address</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>

                <br>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

              </form>
        </div>
    </div>

  </main>

  <br>
  <br>

@endsection
