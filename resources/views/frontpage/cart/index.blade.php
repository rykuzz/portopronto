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
            </a>

        </div>
    </div>
</div>

<div class="container my-5">
    <h1>My Shopping Cart</h1>
    <div class="card shadow ">
        @if ($contain->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($contain as $item )
            <div class="row item_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" height="70px" width="70px" alt="Cart Image Here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6 class="fw-bold">{{$item->product->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>IDR {{$item->product->price}}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden"  class="item_id" value="{{$item->item_id}}">
                    @if ($item->product->qty > $item->item_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeqty decrement-btn">-</button>
                        <input type="text" name="qty" class="form-control qty-input text-center" value="{{$item->item_qty}}">
                        <button class="input-group-text changeqty increment-btn">+</button>
                        </div>
                        @php $total += $item->product->price*$item->item_qty; @endphp
                        @else
                        <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-item">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6 class="text-center"> Total Belanjaan = {{$total}}</h6>
            <a href="{{url('/checkout')}}" class="btn btn-success float-end"> Checkout</a>
        </div>
        @else
        <div class="card-body text-center">
            <h2> Your Shopping Cart is Empty</h2>
            <a href="{{url('/kumpulan')}}" class="btn btn-primary float-end"> Try Shopping</a>
        </div>
        @endif
    </div>
</div>

@endsection


