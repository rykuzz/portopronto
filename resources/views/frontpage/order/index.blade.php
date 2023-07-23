@extends('layouts.app')

@section('title', 'Barbatos Shop')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order List</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <div class="border p-2">{{$order->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{$order->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$order->email}}</div>
                            <label for="">Phone No.</label>
                            <div class="border p-2">{{$order->phone}}</div>
                            <label for="">Package Destination</label>
                            <div class="border p-2">
                                {{$order->country}}
                                {{$order->country}}
                                {{$order->country}}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date of Order</th>
                                        <th>Tracking ID</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item )
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                        <td>{{$item->track_order}}</td>
                                        <td>{{$item->total_price}}</td>
                                        <td>{{$item->status == '0'?'pending':'completed'}}</td>
                                        <td>
                                            <a href="{{url('receipt-item/'.$item->id)}}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
