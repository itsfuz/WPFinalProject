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
                    <input type="text" name="full_name" class="form-control @error('fullname') is-invalid @enderror" id="full_name" placeholder="Full Name" value="{{ old('full_name') }}">
                    <label for="full_name">Full Name</label>
                    @error('full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                  <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                  <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" name="confPassword" class="form-control @error('confPassword') is-invalid @enderror" id="confPassword" placeholder="Confirm Password">
                    <label for="confPassword">Confirm Password</label>
                    @error('confPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{ old('address') }}">
                    <label for="address">Address</label>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" name="gender" class="form-control  @error('gender') is-invalid @enderror" id="gender" placeholder="Gender" value="{{ old('gender') }}">
                    <label for="address">Gender</label>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
