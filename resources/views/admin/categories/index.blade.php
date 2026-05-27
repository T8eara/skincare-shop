@extends('layouts.app')

@section('content')
<a href="/admin/dashboard" class="btn btn-dark mb-3">
    ← Back Dashboard
</a>
<h1>Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
    Add Category
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{route('categories.edit', $category->id) }}"
                class="btn btn-warning">
            Edit
            </a>
            <form method="POST" 
                  action="{{ route('categories.destroy', $category->id) }}"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
        </td>
    </tr>    
    @endforeach
</table>
    
@endsection