<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f5f5f5;
        }

        .sidebar{
            width: 250px;
            height: 100vh;
            background: black;
            position: fixed;
            padding: 20px;
        }

        .sidebar a{
            color: white;
            display: block;
            padding: 12px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .sidebar a:hover{
            background: #333;
        }

        .content{
            margin-left: 270px;
            padding: 30px;
        }

        .card-box{
            border: none;
            border-radius: 20px;
            padding: 30px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1 class="text-white mb-4">ADMIN</h1>
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/products">Products</a>
        <a href="/admin/categories">Categories</a>
        <a href="/admin/orders">Orders</a>
        <a href="/">Back Website</a>
    </div>
    <form action="{{ route('logout') }}"
            method="POST">
        @csrf
        <button class="btn btn-danger w-100 mt-3">Logout</button>
    </form>

    <div class="content">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card bg-primary card-box">
                    <h2>Products</h2>
                    <h1>{{ $products }}</h1>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-success card-box">
                    <h2>Categories</h2>
                    <h1>{{ $categories}}</h1>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-dark card-box">
                    <h2>Orders</h2>
                    <h1>{{ $orders }}</h1>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-danger card-box">
                    <h2>Users</h2>
                    <h1>{{ $users }}</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>