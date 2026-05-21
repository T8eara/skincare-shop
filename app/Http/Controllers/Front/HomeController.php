<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->category){
            $query->where('category_id', $request->category);
        }

        if ($request->min_price && $request->max_price){
            $query->whereBetween('price',[
                $request->min_price,
                $request->max_price
            ]);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('front.home', compact('products', 'categories'));
    }
}
