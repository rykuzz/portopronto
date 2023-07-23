@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-prod/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="row">
                        <div class="col-md-4 mb-7">
                            <label for="">Name</label>
                            <input type="text" value="{{$product->name}}" class="form-control" name="name">
                            @error('name')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-7">
                            <label for="">Category</label>
                            <select class="form-control" name="category_id">
                                <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-md-4 mb-7">
                            <label for="">Slug</label>
                            <input type="text" value="{{$product->slug}}" class="form-control" name="slug">
                            @error('slug')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="">Slogan</label>
                            <textarea name="slogan"  rows="3" class="form-control">{{$product->slogan}}"</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="">Detail</label>
                            <textarea name="detail"  rows="3" class="form-control">{{$product->detail}}"</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="">Price</label>
                            <input type="text" value="{{$product->price}}" class="form-control" name="price">
                            @error('price')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-7">
                            <label for="">Quantity</label>
                            <input type="number" value="{{$product->qty}}" class="form-control" name="qty">
                            @error('qty')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status == '1' ? 'checked':''}} name="status">

                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Popular</label>
                        <input type="checkbox" {{$product->popular == '1' ? 'checked':''}}  name="popular">
                    </div>


                    <div class="col-md-4 mb-7">
                        <label for="">title</label>
                        <input type="text" value="{{$product->title}}" class="form-control" name="title">
                        @error('title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Keywords</label>
                        <textarea name="keyword" class="form-control" rows="3"> {{$product->keyword}}</textarea>
                        @error('keyword')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-7">
                        <label for="">Meta_desc</label>
                        <textarea name="meta_dec" class="form-control" rows="3">{{$product->meta_dec}}</textarea>
                        @error('meta_dec')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    @if ($product->image)
                    <img src="{{asset('assets/uploads/product/'.$product->image)}}"  alt="Product Image">
                @endif
                    <div class="col-md-12 mb-3">
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
