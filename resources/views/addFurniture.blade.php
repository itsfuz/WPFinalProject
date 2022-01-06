@extends('layout.master')

@section('content')

<main class="forms">

    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form action="/addFurniture" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Add Furniture</h1>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                  <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="190000" value="{{ old('email') }}">
                  <label for="price">Price</label>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                  <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="Chair">
                  <label for="type">Type</label>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="Brown">
                    <label for="color">Color</label>
                    @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label" for="image">Insert Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image">

                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Furniture</button>

              </form>
        </div>
    </div>

  </main>

@endsection
