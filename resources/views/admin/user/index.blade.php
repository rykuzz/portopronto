@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-succes">{{session('message')}}</div>

    @endif
    <div class="card">
        <div class="card-header">
            <h4>User Page</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user as $product )
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->email}}</td>
                        <td>{{$product->gender}}</td>

                        <td>
                            <a href="{{url('view-user/'.$product->id)}}" class="btn btn-primary">View </a>
                            {{-- <a href="{{url('delete-prod/'.$product->id)}}"
                                onclick="return confirm('Are you sure you want to delete this category?');"
                                class="btn btn-danger">
                                Delete</a> --}}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
