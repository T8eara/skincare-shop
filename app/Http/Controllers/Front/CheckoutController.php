<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index() 
    {
        return view('front.checkout');
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['qty'];
        }
        Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total
        ]);

        session()->forget('cart');
        return redirect('/')
            ->with('success', 'order placed successfully!');
    }
}
