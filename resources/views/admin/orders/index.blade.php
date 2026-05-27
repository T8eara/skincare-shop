<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <a href="/admin/dashboard" class="btn btn-dark mb-3">
    ← Back Dashboard
    </a>
    <h1 class="mb-4">Customer Orders</h1>
    <table>
       <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Total</th>
                <th>Create At</th>
                <th>Actions</th>
            </tr>
       </thead>
       <tbody>
            @foreach($orders as $order)
            <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <form action="{{ url('/admin/orders/' . $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
       </tbody>
    </table>
</body>
</html>