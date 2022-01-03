@extends('layouts.master')

@section('content')


<form action="/updateFurniture" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row mb-3">
        <label for="name">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>

            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="name">Price</label>
        <div class="col-md-6">
            <input type="text" name="price" id="">
        </div>
    </div>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Type
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>

    <div class="row mb-3">
        <label for="name">Color</label>
        <div class="col-md-6">
            <input type="text" name="" id="">
        </div>
    </div>

    <div class="row mb-3">
        <label for="name">Image</label>
        <div class="col-md-6">
            <input type="text" name="" id="">
        </div>
    </div>

</form>



@endsection
