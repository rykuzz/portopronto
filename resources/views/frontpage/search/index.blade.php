@extends('layouts.app')

@section('title', 'Search Items')


@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Search Result</h4>
            </div>

            @foreach ( $search as  $item)

            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($item->qty > 0 )
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out of Stock</label>
                        @endif

                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="{{$item->name}}">
                        </a>
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$item->slug}}</p>
                        <h5 class="product-name">
                           
                                {{$item->name}}
                           </a>
                        </h5>
                        <div>
                            <span class="selling-price">IDR {{$item->price}}</span>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
