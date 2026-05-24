<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body class="container mt-5">
    <h1 class="mb-4"> My Wishlist</h1>
    <div class="row">
        @foreach(session('wishlist', []) as $id => $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/'.$item['image']) }}"
                     class="card-img-top"
                     style="height: 200px; object-fit:cover;">

                     <div class="card-body">
                        <h2>{{ $item['name'] }}</h2>
                        <p>${{ $item['price']}}</p>
                        <a href="{{ route('wishlist.remove',$id) }}"
                            class="btn btn-danger w-100">Remove</a>
                     </div>
                </div>
            </div>
            @endforeach
    </div>
    <a href="/"
        class="btn btn-dark">Back Shopping</a>
    
</body>
</html>