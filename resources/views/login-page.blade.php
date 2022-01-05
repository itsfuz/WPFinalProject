@extends('layout.master')


@section('content')

<main class="forms">

    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form method="POST" action="/login/user">
                <h1 class="h3 mb-3 fw-normal">Please Sign-in</h1>
                @csrf
                <div class="form-floating">
                  <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required autocomplete="email" autofocus>
                  <label for="floatingInput">Email address</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <div class="form-check">
                    <div class="checkbox mb-3">
                        <label>
                          <input type="checkbox" value="remember-me"> Remember Me
                        </label>
                      </div>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit"> {{ __('Login') }}</button>

              </form>
        </div>
    </div>

  </main>

  <br>
  <br>

@endsection
