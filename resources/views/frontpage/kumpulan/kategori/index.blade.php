@extends('layouts.app')

@section('title', 'View Categories')

@section('content')



<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Categories in our shop</h4>
                </div>
                @forelse ($category as $banner )


                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{url('/kumpulan/'.$banner->slug)}}">
                            <div class="category-card-img">
                                <img src="{{asset('assets/uploads/category/'.$banner->photo)}}" class="w-100" alt="Laptop">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$banner->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <h5>Sorry we dont have that categories right now :(</h5>
                </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
