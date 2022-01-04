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
                <div class="row align-items-center">
                    <div class="col-md-3" style="text-align: center">
                        <label for="gander" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}:</label>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                    </div>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register Account</button>

              </form>
        </div>
    </div>

  </main>

  <br>
  <br>

@endsection
