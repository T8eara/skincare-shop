<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
// use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $wishlist =session()->get('wishlist',[]);
        $wishlist[$id] = [
            'name' => $product->name,
            'price' =>$product->price,
            'image' =>$product->image
        ];
        session()->put('wishlist', $wishlist);
        return back()->with(
            'success','Added to wishlist'
        );
    }

    public function index()
    {
        return view('front.wishlist');
    }
    public function remove($id)
    {
        $wishlist = session()->get('wishlist', []);
        unset($wishlist[$id]);
        session()->put('wishlist', $wishlist);
        return back();
    }
}
