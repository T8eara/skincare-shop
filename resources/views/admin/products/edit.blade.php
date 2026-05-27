@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">Edit Product</h1>

    <a href="/admin/products" class="btn btn-dark mb-3">
        Back Products
    </a>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>

            <input type="text"
                   name="name"
                   value="{{ $product->name }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Price</label>

            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ $product->price }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>

            <select name="category_id"
                    class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">

            <label>Current Image</label><br>

            <img src="{{ asset('storage/' . $product->image) }}"
                 width="120"
                 class="mb-3">

        </div>

        <div class="mb-3">

            <label>New Image</label>

            <input type="file"
                   name="image"
                   class="form-control">

        </div>

        <button class="btn btn-primary">
            Update Product
        </button>

    </form>

</div>

@endsection