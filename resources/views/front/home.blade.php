<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skincare Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
             rel="stylesheet" >
    <style>
        body{
            background:#f8f9fa;
        }

        .hero{
            background: url('https://image.unplash.com/photo-1522335789203-aabd1fc54bc9?q=80&w=1400');
            background-size: cover;
            background-position: center;
            height: 400px;
            border-radius:20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            margin-bottom:40px;  
        }

        .hero h1{
            font-size:60px;
            font-weight: bold;
            background: rgba(0,0,0,0.4);
            padding: 20px;
            border-radius: 10px;
        }
        .hero p{
            background: rgba(0,0,0,0.4);
            padding: 20px;
            border-radius: 10px;
        }
        .product-card{
            transition: 0.3s;
            border:none;
            border-radius: 15px;
            overflow: hidden;
        }
        .product-card:hover{
            transform:translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        footer{
            background: black;
            color: white;
            padding: 30px;
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/"> SKINCARE SHOP</a>
        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>    
        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" 
                        href="/">Home
                    </a>    
                </li>
                <li class="nav-item">
                    <a  class="nav-link"
                        href="{{ route('cart.index') }}">Cart({{ count(session('cart',[])) }})</a>    
                </li>   

                <li class="nav-item">
                    <a  class="nav-link"
                        href="{{ route('wishlist') }}">Wishlist({{ count(session('wishlist',[])) }})</a>    
                </li>

                <li class="nav-item">
                    <a  class="nav-link"
                        href="{{ route('orders') }}">Orders</a>    
                </li>
                @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                         <a class="nav-link"
                            href="/admin/dashboard">
                            Admin
                        </a>
                    </li>  
                @endif
            </ul>    
        </div>
        <a href="{{ url('/cart') }}" class="btn btn-dark "> View Cart</a>
    </div>
</nav>
   
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="container mt-4 text-black">
    <div class="hero">
        <h1>Healthy Skin Starts Here</h1>
        <p>Glow naturally with premium skincare products</p>
    </div>

    <form method="GET" class="row mb-5">
        
        <div class="col-md-3 mb-2">
            <input type="text" name="search" value="{{ request('search')}}"
            class="form-control" placeholder="Search products...">
        </div>

        <div class="col-md-3 mb-2">
            <select name="category" class="form-control">
                <option value="">All Categories</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 mb-2">
            <input type="number" name="min_price" min="0" value="{{ request('min_price') }}"
            class="form-control" placeholder="Min Price">
        </div>
        <div class="col-md-2 mb-2">
            <input type="number" name="max_price" min="0" value="{{ request('max_price') }}"
            class="form-control" placeholder="Max Price">
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-success w-100">Filter</button>    
        </div>

    </form>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 product-card">
                   <a href="{{ route('product.detail', $product->id) }}">
                     <img src="{{ asset('storage/' .$product->image) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit:cover;">
                   </a>
                         
                    <div class="card-body text-center">
                        <h3>
                            <a href="{{ route('product.detail', $product->id) }}"
                                class="text-dark text-decoration-none">
                                {{$product->name}}
                            </a>
                        </h3>
                        <p class="text-muted">
                            {{ $product->category->name ?? 'No Category' }}
                        </p>

                        <h2 class="text-success">
                            ${{ $product->price }}
                        </h2>

                        <form method="POST" action="{{ route('cart.add' , $product->id) }}">
                            @csrf
                            <button class="btn btn-dark w-100">
                                Add to Cart
                            </button>
                        </form>
                        
                        <form action="{{ route('wishlist.add', $product->id) }}"
                              method="POST"
                              class="mt-2">
                            @csrf
                            <button class="btn btn-outline-danger w-100">
                                ❤️ Favorite
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
<footer>
    <h4>Skincare Shop</h4>
    <p>Premium skincare products for healthy glowing skin.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>