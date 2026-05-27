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
    $request->validate([

        'min_price' => 'nullable|numeric|min:0',

        'max_price' => 'nullable|numeric|gte:min_price'

    ]);

    $query = Product::query();

    if($request->search)
    {
        $query->where(function($q) use ($request){

            $q->where('name',
                      'like',
                      '%'.$request->search.'%')

              ->orWhere('description',
                        'like',
                        '%'.$request->search.'%');

        });
    }

    if($request->category)
    {
        $query->where('category_id',
                      $request->category);
    }

    if($request->min_price)
    {
        $query->where('price',
                      '>=',
                      $request->min_price);
    }

    if($request->max_price)
    {
        $query->where('price',
                      '<=',
                      $request->max_price);
    }

    $products = $query->paginate(8);

    $categories = Category::all();

    return view('front.home',
                compact('products',
                        'categories'));
}
public function show($id)
{
    $product = Product::findOrFail($id);

    return view('front.detail',
                compact('product'));
}
}
