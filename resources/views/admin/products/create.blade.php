@extends('layouts.app')

@section('content')
<h2>Add Product</h2>
<form method="POST"
      action="{{ route('products.store')}}"
      enctype="multipart/form-data">
    @csrf
    <input type="text" 
           name="name" 
           class="form-control mb-3"
           placeholder="Product Name">
    <input type="text" 
           name="price"
           class="form-control mb-3" 
           placeholder="Price">
    <input name="description" 
              class="form-control mb-3" 
              placeholder="Description"></input>
    <input type="file"
           name="image"
           class="form-control mb-3">
    <select name="category_id"
            class="form-control mb-3">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                           {{ $category->name}}
            </option>
        @endforeach
    </select>
    <button class="btn btn-success">Save Product</button>
</form>
    
@endsection