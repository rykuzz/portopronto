@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Add Slider</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-slid/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-7">
                        <label for="">Title</label>
                        <input type="text" value="{{$slider->title}}" class="form control" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="desc"   rows="3" class="form-control">{{$slider->desc}}</textarea>
                        @error('desc')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$slider->status == '1'?'checked': ''}}  style="width:30px,height:30px">
                        Checked=Hidden,UnChecked=Visible
                    </div>

                    @if ($slider->image)
                        <img src="{{asset('assets/uploads/slider/'.$slider->image)}}" alt="Product Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="submit"class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
