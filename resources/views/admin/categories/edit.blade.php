@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">Edit Category</h1>

    <a href="/admin/categories"
       class="btn btn-dark mb-3">
       Back Categories
    </a>

    <form action="{{ route('categories.update', $category->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Category Name</label>

            <input type="text"
                   name="name"
                   value="{{ $category->name }}"
                   class="form-control">

        </div>

        <button class="btn btn-primary">
            Update Category
        </button>

    </form>

</div>

@endsection