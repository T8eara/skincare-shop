<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="container mt-5">
    <h1 class="mb-4">My Orders</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total</th>
            <th>Create At</th>
        </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id}}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            <td>${{ $order->total }}</td>
            <td>{{ $order->create_at }}</td>
        </tr>
    @endforeach
    </table>
    <a href="/" class="btn btn-dark">Back Shopping</a>
</body>
</html>