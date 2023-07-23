<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class InterfaceController extends Controller
{
    public function index(){


         $slider = Slider::where('status','0')->get();
         $product = Product::where('popular','1')->take(15)->get();
            $category = Category::where('trending','1')->take(15)->get();
        return view('frontpage.index', compact('slider','product','category'));

      }

      public function kumpulan()
      {
        $category = Category::where('status','0')->get();
        //$bar = Category::all();
        return view('frontpage.kumpulan.kategori.index', compact('category'));
      }

      public function produk($slug)
      {
        $category = Category::where('slug',$slug)->first();
        if($category){

            $product = $category->product()->get();
            return view('frontpage.kumpulan.produk.index',compact('product','category'));

        }else{
            return redirect('/')->with('message','Slug does not exist');
        }
      }

      public function view_detail($slug,$brand)
      {
        if(Category::where('slug',$slug)->exists())
        {
            if(Product::where('slug',$brand)->exists())
            {
                $product = Product::where('slug',$brand)->first();
                return view('frontpage.kumpulan.produk.view', compact('product'));
            }else
            {
                return redirect('/')->with('message','Error link not found');
            }
        }else
        {
            return redirect('/')->with('message','Error category not found');
        }
      }

      public function search()
      {
        $product = Product::select('name')->where('status','0')->get();
        $data =[];
        foreach ($product as $item) {

            $data[] = $item['name'];
        }

        return $data;
      }

      public function searchitem(Request $request)
      {
        $search = $request->contain_name;
        if ($search != "")
        {
            $product = Product::where("name","LIKE","%$search%")->first();
            if ($product)
            {
                return redirect('kumpulan/'.$product->category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with("status","Search Not found");
            }
        }
        else
        {

            return redirect()->back();
        }
      }


}
