<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h1>Your Cart</h1>
    @if(session('cart'))
    <table class="table">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>    
        </tr>
    @php $total = 0; @endphp
    @foreach(session('cart') as $id => $item)
    
    @php $total += $item['price'] * $item['qty']; @endphp
    <tr>
        <td>
            <img src="{{ asset('storage/' .$item['image']) }}" width="60">
        </td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }}</td>
        <td>{{ $item['qty'] }}</td>
        <td>${{ $item['price'] * $item['qty'] }}</td>
        <td>
            <form method="POST" action="{{ url('/cart/remove/' .$id) }}">
                @csrf
                <button class="btn btn-danger btn-sm"> Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>   
    <h2>Total: ${{ $total }}</h2>

    <a href="{{ url('/checkout') }}"
        class="btn btn-primary"> Checkout</a>
    @else
        <p>Your cart is empty</p>
    @endif
</body>
</html>