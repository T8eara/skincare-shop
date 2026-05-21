<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skincare Shop</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/"> SKINCARE SHOP</a>
        <a href="{{ url('/cart') }}" class="btn btn-dark "> View Cart</a>
    </div>
</nav>
   
<div class="container mt-4 text-black">
    <div class="hero">
        <h1>Healthy Skin Starts Here</h1>
        <p>Glow naturally with premium skincare products</p>
    </div>

    <form method="GET" class="row mb-5">
        <div class="col-md-4 mb-2">
            <select name="category" class="form-control">
                <option value="">All Categories</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-2">
            <input type="number" name="min_price" class="form-control" placeholder="Min Price">
        </div>
        <div class="col-md-3 mb-2">
            <input type="number" name="max_price" class="form-control" placeholder="Max Price">
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-success w-100">Filter</button>    
        </div>

    </form>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 product-card">
                    <img src="{{ asset('storage/' .$product->image) }}"
                         class="card-img-top"
                         style="height: 250px; object-fit:cover;">
                         
                    <div class="card-body text-center">
                        <h3 class="fw-bold">{{ $product->name }}</h3>
                        <p class="text-muted">
                            {{ $product->category->name ?? 'No Category' }}
                        </p>

                        <h2 class="text-success">
                            ${{ $product->price }}
                        </h2>

                        <form method="POST" action="{{ url('/cart/add/' . $product->id) }}">
                            @csrf
                            <button class="btn btn-dark w-100">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
<footer>
    <h4>Skincare Shop</h4>
    <p>Premium skincare products for healthy glowing skin.</p>
</footer>
</body>
</html>