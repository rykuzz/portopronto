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
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $category as $category )
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->photo}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/category/'.$category->photo)}}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="{{url('edit-category/'.$category->id)}}" class="btn btn-primary">Edit </a>
                            <a href="{{url('delete-category/'.$category->id)}}"
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
