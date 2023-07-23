<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function store(CategoryFormRequest $request){

        $validatedata = $request ->validated();

        $category = new Category;
        $category ->name  = $validatedata['name'];
        $category ->title  = $validatedata['title'];
        $category ->slug  = $validatedata['slug'];
        $category ->description  = $validatedata['description'];
        $category ->status  =$request->status == TRUE ? '1':'0';
        $category ->trending  =$request->trending == TRUE ? '1':'0';
        $category ->keywords  = $validatedata['keywords'];
        $category ->meta_desc  = $validatedata['meta_desc'];



        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/category/',$filename);
            $category ->photo  = $filename;

        }
        $category->save();
        return redirect('/dashboard')->with('message','Category Added Successfully!');

    }

    public function edit($id){

        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $validatedata = $request ->validated();
        $category = Category::findorFail($id);
        if($request->hasFile('photo')){

            $path ='assets/uploads/category/'.$category->photo;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('photo');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/category/',$filename);
            $category ->photo  = $filename;
        }

        $category ->name  = $validatedata['name'];
        $category ->title  = $validatedata['title'];
        $category ->slug  = $validatedata['slug'];
        $category ->description  = $validatedata['description'];
        $category ->status  =$request->status == TRUE ? '1':'0';
        $category ->trending  =$request->trending == TRUE ? '1':'0';
        $category ->keywords  = $validatedata['keywords'];
        $category ->meta_desc  = $validatedata['meta_desc'];
        $category -> update();
        return redirect('/dashboard')->with('message','Category Updated Successfully!');
    }

    public function execute($id)
    {
        $category = Category::find($id);
        $path ='assets/uploads/category/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $product->delete();
            return redirect('/dashboard')->with('message','Product Deleted Successfully!');
    }



}
