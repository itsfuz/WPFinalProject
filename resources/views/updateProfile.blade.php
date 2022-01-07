@extends('layout.master')

@section('content')

<main class="forms">

    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form action="/updateProfile" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Update Profile</h1>

                <div class="form-floating">
                    <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="name" value="{{ old('full_name') }}">
                    <label for="name">Full Name</label>
                    @error('name')
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
                  <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="Chair">
                  <label for="type">Address</label>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Update Profile</button>

              </form>
        </div>
    </div>

  </main>

@endsection
