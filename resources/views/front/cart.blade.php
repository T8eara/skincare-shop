<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Shopping Cart</h1>

    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>    
        </tr>
    @php $grandTotal = 0; @endphp
    @foreach(session('cart', []) as $id => $item)
    
    @php $total = $item['price'] * $item['qty']; 
         $grandTotal += $total;
    @endphp
    <tr>
        <td>
            <img src="{{ asset('storage/' .$item['image']) }}" width="80">
        </td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }}</td>
        <td>{{ $item['qty'] }}</td>
        <td>${{ $total }}</td>
        <td>
            <a href="{{ route('cart.remove', $id) }}" 
                class="btn btn-danger">Remove</a>
        </td>
    </tr>
    @endforeach
    </table>   
    <h2>Grand Total: ${{ $grandTotal }}</h2>

    <a href="/"
        class="btn btn-dark"> Continue Shopping
    </a>

    <a href="{{ route('checkout') }}"
        class="btn btn-success">Checkout
    </a>
</body>
</html>