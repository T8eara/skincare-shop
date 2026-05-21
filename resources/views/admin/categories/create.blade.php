@extends('layouts.app')

@section('content')
<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store')}}">
    @csrf
    <input type="text" 
           name="name" 
           class="form-control mb-3"
           placeholder="Category Name">
    <button class="btn btn-success">Save</button>
</form>
@endsection