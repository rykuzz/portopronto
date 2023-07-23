@extends('layouts.app')

@section('title')
{{$category->title}}
@endsection

@section('keywords')
{{$category->keywords}}
@endsection
@section('meta_desc')
{{$category->meta_desc}}
@endsection

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Selling Products</h4>
            </div>

            @forelse ( $product as  $item)

            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($item->qty > 0 )
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out of Stock</label>
                        @endif
                        <a href="{{url('/kumpulan/'.$item->category->slug.'/'.$item->slug)}}">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="{{$item->name}}">
                        </a>
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$item->slug}}</p>
                        <h5 class="product-name">
                           <a href="{{url('/kumpulan/'.$item->category->slug.'/'.$item->slug)}}">
                                {{$item->name}}
                           </a>
                        </h5>
                        <div>
                            <span class="selling-price">IDR {{$item->price}}</span>

                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Sorry there is no such {{$category->name}} product</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
