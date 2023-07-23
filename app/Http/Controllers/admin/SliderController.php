<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){

        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }

    public function add(){

        return view('admin.slider.add');
    }

    public function store(SliderFormRequest $request){

        $validatedata = $request ->validated();
        $slider = new Slider;
        $slider ->title  = $validatedata['title'];
        $slider ->desc  = $validatedata['desc'];
        $slider ->status  = $validatedata['status']= $request->status == true ? '1':'0';


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/slider/',$filename);
            $slider ->image  = $filename;

        }

        $slider->save();
        return redirect('/slider')->with('message','Slider Added Succesfully!');
    }

    public function edit($id){


        $slider = Slider::findOrFail($id);


         return view('admin.slider.edit', compact('slider'));

        //return $product;
    }

    public function update(SliderFormRequest $request, $slider){
        $validatedata = $request ->validated();

        $slider = Slider::findOrFail($slider);


        $slider ->title  = $validatedata['title'];
        $slider ->desc  = $validatedata['desc'];
        $slider ->status  = $validatedata['status']= $request->status == true ? '1':'0';

        if($request->hasFile('image')){

            $path ='assets/uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file ->move('assets/uploads/slider/',$filename);
            $slider ->image  = $filename;

        }
        $slider->update();
        return redirect('/dashboard')->with('message','Slider Updated Successfully!');

    }

    public function execute($slider){

        $slider = Slider::find($slider);
        $path ='assets/uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $slider->delete();
            return redirect('/dashboard')->with('message','Product Deleted Successfully!');

    }


}

