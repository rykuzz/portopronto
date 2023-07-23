@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Add Slider</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-7">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="desc"   rows="3" class="form-control"></textarea>
                        @error('desc')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" style="width:30px,height:30px">
                        Checked=Hidden,UnChecked=Visible
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="submit"class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
