<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h1>
                {{ $product->name }}
            </h1>

            <h2 class="text-success mb-3">
                ${{ $product->price }}
            </h2>

            <p>{{ $product->description }}</p>

            <p>
                <strong>Category: </strong>
                {{ $product->category->name}}
            </p>

            <form action="{{ route('cart.add', $product->id) }}"
                  method="POST">
                @csrf
                <button class="btn btn-dark">Add To Cart</button>    
            </form>

            <a href="/"
                class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
    
</body>
</html>