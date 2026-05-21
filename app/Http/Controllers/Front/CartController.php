<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
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

        return redirect()->back();
    }

    public function remove($id){
        $cart = sesion()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);
        return redirect()->back();
    }
}
