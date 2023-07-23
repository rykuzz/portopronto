@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col-md-4 mb-7">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-7">
                            <label for="">Category</label>
                            <select class="form-control" name="category_id" >
                                <option value=""> -- Choose Category --</option>
                                @foreach ($category as $dropdown )
                                    <option value="{{$dropdown->id}}">{{$dropdown->name}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-md-4 mb-7">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                            @error('slug')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="">Slogan</label>
                            <textarea name="slogan"  rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="">Detail</label>
                            <textarea name="detail"  rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-7">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="qty">
                            @error('qty')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Status</label>
                        <input type="checkbox"  name="status">

                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Popular</label>
                        <input type="checkbox"  name="popular">
                    </div>


                    <div class="col-md-4 mb-7">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Keywords</label>
                        <textarea name="keyword" class="form-control" rows="3"></textarea>
                        @error('keyword')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Meta_desc</label>
                        <textarea name="meta_dec" class="form-control" rows="3"></textarea>
                        @error('meta_dec')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
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
