@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-succes">{{session('message')}}</div>

    @endif
    <div class="card">
        <div class="card-header">
            <h4>Slider List Page</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tile</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $slider as $output )
                        <tr>
                            <td>{{$output->id}}</td>
                            <td>{{$output->title}}</td>
                            <td>{{$output->desc}}</td>
                            <td>{{$output->status == '0' ? 'Visible':'Hidden'}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/slider/'.$output->image)}}" class="cate-image" alt="slider here">
                            </td>
                            <td>
                                <a href="{{url('edit-slid/'.$output->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{url('delete-slid/'.$output->id)}}"
                                    onclick="return confirm('Are you sure you want to delete this slider?');"
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
