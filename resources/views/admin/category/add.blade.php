@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/categories')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-7">
                        <label for="">Name</label>
                        <input type="text" class="form control" name="name">
                        @error('name')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Slug</label>
                        <input type="text" class="form control" name="slug">
                        @error('slug')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Status</label>
                        <input type="checkbox"  name="status">

                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Trending</label>
                        <input type="checkbox"  name="trending">
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">title</label>
                        <input type="text" class="form control" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Keywords</label>
                        <textarea name="keyword" rows="3"></textarea>
                        @error('keyword')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Meta_desc</label>
                        <textarea name="meta_desc" rows="3"></textarea>
                        @error('meta_desc')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

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
