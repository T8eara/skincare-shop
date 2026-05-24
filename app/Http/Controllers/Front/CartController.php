<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('front.cart');
    }

    public function add($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => 1
            ];
        }
        session()->put('cart', $cart);

        return back()->with(
            'success','Product added to cart'
        );
    }

    public function remove($id){
        $cart = session()->get('cart');

        unset($cart[$id]);

        session()->put('cart', $cart);
        return back();
    }
}
