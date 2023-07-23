@extends('layouts.app')

@section('title', 'Barbatos Shop')

@section('content')

    <link href="{{ asset('interface/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('interface/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <script src="{{ asset('interface/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('interface/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('interface/js/owl.carousel-min.js') }}"></script>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach ($slider as $key => $slideritem)
                <div class="carousel-item {{ $key == '0' ? 'active' : '' }} active">
                    @if ($slideritem->image)
                        <img src="{{ asset('assets/uploads/slider/' . $slideritem->image) }}" class="d-block w-100"
                            alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $slideritem->title }}
                            </h1>
                            <p>
                                {{ $slideritem->desc }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 ">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel owl-product owl-theme">
                    @foreach ($product as $banner)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/product/'.$banner->image) }}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $banner->name }}</h5>
                                    <span class="float-start">IDR {{ $banner->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="py-5 ">
            <div class="container">
                <div class="row">
                    <h2>Featured Category</h2>
                    <div class="owl-carousel owl-product owl-theme">
                        @foreach ($category as $banner)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/' . $banner->photo) }}" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $banner->name }}</h5>
                                        <p>{{$banner->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $('.owl-product').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>
    @endsection
