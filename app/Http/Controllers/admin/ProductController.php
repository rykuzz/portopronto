<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){

        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    public function add(){

        $category = Category::all();

        return view('admin.product.add', compact('category'));
    }

    public function edit($id){
        $category = Category::all();

        $product = Product::find($id);
        return view('admin.product.edit', compact('product','category'));
    }

    public function store(ProductFormRequest $request){

        $validatedata = $request ->validated();

        $product = new Product;
        $product ->category_id  = $validatedata['category_id'];
        $product ->name  = $validatedata['name'];
        $product ->title  = $validatedata['title'];
        $product ->slug  = $validatedata['slug'];
        $product ->detail  = $validatedata['detail'];
        $product ->slogan  = $validatedata['slogan'];
        $product ->qty  = $validatedata['qty'];
        $product ->price  = $validatedata['price'];
        $product ->status  =$request->status == TRUE ? '1':'0';
        $product ->popular  =$request->popular == TRUE ? '1':'0';
        $product ->keyword  = $validatedata['keyword'];
        $product ->meta_dec  = $validatedata['meta_dec'];



        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/product/',$filename);
            $product ->image  = $filename;

        }
        $product->save();
        return redirect('/dashboard')->with('message','Product Added Successfully!');

    }



    public function update(ProductFormRequest $request, $id)
    {
        $validatedata = $request ->validated();
        $product = Product::findorFail($id);
        $product ->category_id  = $validatedata['category_id'];
        $product ->name  = $validatedata['name'];
        $product ->title  = $validatedata['title'];
        $product ->slug  = $validatedata['slug'];
        $product ->detail  = $validatedata['detail'];
        $product ->slogan  = $validatedata['slogan'];
        $product ->qty  = $validatedata['qty'];
        $product ->price  = $validatedata['price'];
        $product ->status  =$request->status == TRUE ? '1':'0';
        $product ->popular  =$request->popular == TRUE ? '1':'0';
        $product ->keyword  = $validatedata['keyword'];
        $product ->meta_dec  = $validatedata['meta_dec'];
        if($request->hasFile('image')){

            $path ='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/product/',$filename);
            $product ->image  = $filename;
        }

        $product ->update();

        return redirect('/dashboard')->with('message','Product Updated Successfully!');
    }

    public function execute($id)
    {
        $product = Product::find($id);
        $path ='assets/uploads/category/'.$product->photo;
            if(File::exists($path)){
                File::delete($path);
            }

            $product->delete();
            return redirect('/dashboard')->with('message','Category Deleted Successfully!');
    }




}
