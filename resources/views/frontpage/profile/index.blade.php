@extends('layouts.app')

@section('title', 'Barbatos Shop')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Profile
                        <a href="{{url('/')}}" class="btn btn-primary btn-sm float-end">Return</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="">Username</label>
                            <div class="p-2 border">{{$user->name}}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Email</label>
                            <div class="p-2 border">{{$user->email}}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Gender</label>
                            <div class="p-2 border">{{$user->gender}}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Date of Birth</label>
                            <div class="p-2 border">{{$user->dob}}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Country</label>
                            <div class="p-2 border">{{$user->country}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
