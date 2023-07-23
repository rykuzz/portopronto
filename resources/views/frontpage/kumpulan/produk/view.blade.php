@extends('layouts.app')

@section('title',$product->name)


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <div class="mb-0">
            <a href="{{url('/kumpulan')}}"> Kumpulan
            </a>/
            <a href="{{url('kumpulan/'.$product->category->slug)}}">
                {{$product->category->name}}
            </a>/
            <a href="{{url('kumpulan/'.$product->category->slug.'/'.$product->slug)}}">
                {{$product->name}}
            </a>

        </div>
    </div>
</div>

<div class="container">
    <div class="card shadow item_data ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                    {{$product->name}}
                        @if ($product->popular == '1')
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Popular</label>
                        @endif
                    </h2>

                    <hr>
                    <label class="fw-bold">Harga : IDR {{$product->price}}</label>
                    <p class="mt-3">
                        {!! $product->slogan !!}
                    </p>
                    <hr>
                    @if ($product->qty > 0 )
                    <label class="stock bg-success">In Stock</label>
                        @else
                    <label class="stock bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$product->id}}" class="proditem_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="qty qty-input" value="1" class="form-control qty-input text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if ($product->qty > 0 )

                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> Add to Cart</button>
                            @endif
                            

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Detail Product</h3>
                    <p class="mt-3">
                        {!! $product->detail !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


