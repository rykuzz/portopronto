@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-7">
                        <label for="">Name</label>
                        <input type="text" value="{{$category->name}}" class="form control" name="name">
                        @error('name')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form control" name="slug">
                        @error('slug')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control"> {{$category->description}}"</textarea>
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status == '1' ? 'checked':''}} name="status">

                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$category->trending == '1' ? 'checked':''}} name="trending">
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">title</label>
                        <input type="text" class="form control" value="{{$category->title}}" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Keywords</label>
                        <textarea name="keywords" rows="3"> {{$category->keywords}}</textarea>
                        @error('keywords')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Meta_desc</label>
                        <textarea name="meta_desc" rows="3">{{$category->meta_desc}}</textarea>
                        @error('meta_desc')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    @if ($category->photo)
                    <img src="{{asset('assets/uploads/category/'.$category->photo)}}"  alt="Category Image">
                @endif
                    <div class="col-md-12">
                        <input type="file" name="photo" id="photo" class="form-control">
                        @error('photo')
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
