<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('front.orders',
                    compact('orders'));
    }
}