<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartFormRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function additem(Request $request)
    {
        $item_id = $request->input('item_id');
        $item_qty = $request->input('item_qty');

        if(Auth::check())
        {
            $item_check = Product::where('id',$item_id)->first();

            if($item_check){

                if(Cart::where('item_id',$item_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>  "Item " .$item_check->name. " Already in the Cart!"]);
                }else{
                    $cart = new Cart();
                    $cart ->item_id = $item_id;
                    $cart ->item_qty = $item_qty;
                    $cart ->user_id = Auth::id();
                    $cart->save();
                    return response()->json(['status'=>"Item ".$item_check->name." Added to Cart!"]);
                }
            }
        }
        else{
            return response()->json(['status' => "Please Login to Continue"]);
        }
    }

    public function viewitem()
    {
        $contain = Cart::where('user_id',Auth::id())->get();
        return view('frontpage.cart.index', compact('contain'));
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $item_id = $request->input('item_id');
            if(Cart::where('item_id', $item_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('item_id', $item_id)->where('user_id', Auth::id())->first();
                $cart->delete();
                return response()->json(['status' => "Item Deleted Successfully"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function updateitem(Request $request)
    {
        $item_id = $request->input('item_id');
        $itemprod_qty = $request->input('item_qty');

        if(Auth::check()){

            if(Cart::where('item_id', $item_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('item_id', $item_id)->where('user_id', Auth::id())->first();
                $cart->item_qty = $itemprod_qty;
                $cart->update();
                return response()->json(['status' => "Item Quantity Updated Successfully"]);
            }

        }
    }


}
