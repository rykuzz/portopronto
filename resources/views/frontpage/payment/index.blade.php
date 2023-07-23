@extends('layouts.app')

@section('title', 'Barbatos Shop')

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <div class="mb-0">
            <a href="{{url('/')}}"> Home
            </a>/
            <a href="{{url('/cart')}}">
                Cart
            </a>/
            <a href="{{'/checkout'}}">
            Checkout
            </a>

        </div>
    </div>
</div>

<div class="container mt-3">
    <h1>Checkout Page</h1>
   <form action="{{url('pay-order')}}" method="POST">
    {{ csrf_field() }}
     <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6>Checkout Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for=""> First Name</label>
                            <input type="text" class="form-control"  name="fname" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Country</label>
                            <input type="text" class="form-control" name="country" placeholder="Country">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="col-md-6">
                            <label for=""> City</label>
                            <input type="text" class="form-control" name="city" placeholder="City">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cold-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Item Order Details</h6>
                    <hr>
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $contain )
                            <tr>
                                <td>{{$contain->product->name}}</td>
                                <td>{{$contain->item_qty}}</td>
                                <td>{{$contain->product->price}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary float-end">Pay!</button>
                </div>
            </div>
        </div>
       </div>
    </form>
</div>

@endsection


