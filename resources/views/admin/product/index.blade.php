@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-succes">{{session('message')}}</div>

    @endif
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Detail</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $product as $product )
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->detail}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qty}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/product/'.$product->image)}}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="{{url('edit-prod/'.$product->id)}}" class="btn btn-primary">Edit </a>
                            <a href="{{url('delete-prod/'.$product->id)}}"
                                onclick="return confirm('Are you sure you want to delete this category?');"
                                class="btn btn-danger">
                                Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
