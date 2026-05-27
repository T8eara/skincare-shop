<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Checkout</h1>
    <form action="{{ route('checkout.store') }}"
          method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                    name="customer_name"
                    class="form-control">
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text"
                    name="phone"
                    class="form-control">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address"
                      class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Place Order</button>
    </form>
    
</body>
</html>