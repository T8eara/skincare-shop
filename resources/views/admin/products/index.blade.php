@extends('layouts.app')
@section('content')
<a href="/admin/dashboard" class="btn btn-dark mb-3">
    ← Back Dashboard
</a>
<h1>Products</h1>

<a href="/admin/products/create"
   class="btn btn-success mb-3">
   + Add Product
</a>

<table class="table table-bordred">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td>
            <img src="{{ asset('storage/' . $product->image) }}" 
                 width="80">
        </td>
        <td>{{ $product->name}}</td>
        <td>${{ $product->price}}</td>
        <td>{{ $product->category->name ?? 'No Category'}}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-warning btn-sm"> Edit
            </a>

            <form action="{{ route('products.destroy', $product->id) }}"
                 method="POST"
                 style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">Delete </button>
            </form>
        </td>
    </tr>        
    @endforeach
</table>
    
@endsection