<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        // $old_cart = Cart::where('user_id', Auth::id())->get();
        // foreach($old_cart as $item){
        //     if(!Product::where('id',$item->item_id)->where('qty','>=',$item->item_qty)->exists()){

        //         $remove = Cart::where('user_id',Auth::id())->where('item_id',$item->item_id)->first();
        //         $remove->delete();
        //     }
        // }
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('frontpage.payment.index', compact('cart'));
    }

    public function order(Request $request)
    {
        $order = new Order();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->country = $request->input('country');
        $order->address = $request->input('address');
        $order->city = $request->input('city');



        $order->id;
        $total = 0;
        $cart = Cart::where('user_id', Auth::id())->get();
        foreach($cart as $prod){
            $total += $prod->product->price * $prod->item_qty;
        }
        $order->total_price = $total;
        $order->track_order = 'gekky'.rand(1111,9999);
        $order->save();


        $cart = Cart::where('user_id', Auth::id())->get();
        foreach($cart as $item){

            OrderItem::create([
                'order_id'=> $order->id,
                'item_id'=> $item->item_id,
                'qty'=> $item->item_qty,
                'price'=> $item->product->price,
            ]);
            $product = Product::where('id',$item->item_id)->first();
            $product->qty = $product->qty - $item->item_qty;
            $product -> update();
        }

        // if(Auth::user()->address == NULL){
        //     $user = User::where('id', Auth::id())->first();
        //     $order->name = $request->input('fname');
        //     $order->lname = $request->input('lname');
        //     $order->phone = $request->input('phone');
        //     $order->address = $request->input('address');
        //     $order->city = $request->input('city');
        //     $user->update();
        // }
        $cart = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cart);
        return redirect('/')->with('status',"Order Successfully");
    }
}
