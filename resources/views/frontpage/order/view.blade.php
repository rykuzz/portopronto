@extends('layouts.app')

@section('title', 'Barbatos Shop')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Item Contain</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date of Order</th>
                                <th>Tracking ID</th>
                                <th>Total Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item )
                            <tr>
                                <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                <td>{{$item->track_order}}</td>
                                <td>{{$item->total_price}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
