@extends('layout.master')

@section('content')
<br>
<h1>Transaction History</h1>
<div class="container" style="padding: 30px; text-align:center">
   <h6>Transaction id:</h6>
   <h6>Transaction Date:</h6>
   <h6>Method:</h6>
   <h6>Crad Number:</h6>
   <h6>User's Name:</h6>


   <div class="card">
    @foreach ( as )
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Furniture's Name</th>
            <th scope="col">Furniture's Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price for Each Furniture</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Name</th>
            <td>Price</td>
            <td>Quantity</td>
            <td>TotalPrice</td>
          </tr>
          <tr>
            <td colspan="2">Total Price</td>
            <td>Total Price</td>
          </tr>
        </tbody>
      </table>
    @endforeach
   </div>

</div>



@endsection
