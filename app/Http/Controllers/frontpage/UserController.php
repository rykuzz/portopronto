<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $order = Order::get();
        return view('frontpage.order.view', compact('order'));
    }

    // public function view($id)
    // {
    //     $order = Order::where('id',$id)->where('id',Auth::id())->first();
    //     return view('frontpage.order.index', compact('order'));
    // }
 }
