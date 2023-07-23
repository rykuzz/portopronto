@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-succes">{{session('message')}}</div>

    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Detail
                            <a href="{{url('panel')}}" class="btn btn-primary btn-sm float-right">Return</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="">User Role</label>
                                <div class="p-2 border">{{$user->usertype == '0'? 'User':'Admin'}}</div>
                            </div>
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
