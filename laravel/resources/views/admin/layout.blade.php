<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #111827;
            color: white;
            padding: 20px;
            flex-shrink: 0;
        }

        .sidebar a {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background: #374151;
            color: white;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }

        tr {
            border-bottom: 1px solid #eee;
        }

        .btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 13px;
        }

        .btn-green { background: green; }
        .btn-gray { background: #6b7280; }
        .btn-blue { background: #2563eb; }
        .btn-red {
            background: red;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="sidebar">
        <h3>Admin</h3>
        <a href="/admin/categories">Categories</a>
        <a href="/admin/products">Products</a>
        <a href="{{ route('home') }}">Back to site</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>
