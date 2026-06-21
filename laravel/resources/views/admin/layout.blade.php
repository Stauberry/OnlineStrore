<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body style="margin:0; font-family: Arial;">

<div style="display:flex; min-height:100vh;">

    <!-- SIDEBAR -->
    <div style="width:220px; background:#1f2937; color:white; padding:20px;">
        <h3>Admin</h3>

        <ul style="list-style:none; padding:0;">
            <li style="margin-bottom:10px;">
                <a style="color:white;" href="{{ route('dashboard') }}">Back to Dashboard</a>
            </li>

            <li style="margin-bottom:10px;">
                <a style="color:white;" href="/admin/categories">Categories</a>
            </li>

            <li style="margin-bottom:10px;">
                <a style="color:white;" href="/admin/products">Products</a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div style="flex:1; padding:20px; background:#f3f4f6;">
        @yield('content')
    </div>

</div>

</body>
</html>
