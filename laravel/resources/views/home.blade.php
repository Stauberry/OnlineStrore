<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        /* HEADER */
        .header {
            height: 70px;
            background: white;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .logo { font-size: 22px; font-weight: bold; }

        .user-menu {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-menu a {
            text-decoration: none;
            color: #111827;
        }

        .admin-btn {
            padding: 8px 12px;
            background: #dc2626;
            color: white !important;
            border-radius: 6px;
        }

        /* CONTENT */
        .content { padding: 30px; }

        /* CATEGORY */
        .category-bar {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .category-card {
            min-width: 150px;
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid #ddd;
            text-decoration: none;
            color: black;
        }

        .category-card.active {
            background: #2563eb;
            color: white;
        }

        /* FILTER */
        .filters {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filters input,
        .filters select {
            padding: 8px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        /* CARD */
        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #e5e7eb;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .img {
            width: 100%;
            height: 180px;
            background: #eee;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .title { font-weight: bold; }
        .price { margin-top: 10px; font-weight: bold; }

        .footer {
            text-align: center;
            padding: 20px;
            background: white;
            border-top: 1px solid #ddd;
            margin-top: 40px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header class="header">

    <div class="logo">My Shop</div>

    <div class="user-menu">

        @auth
            <span>{{ Auth::user()->name }}</span>

            <a href="{{ route('profile.edit') }}">Profile</a>

            @permission('access_admin_panel')
            <a href="/admin" class="admin-btn">Admin</a>
            @endpermission

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="border:none;background:none;cursor:pointer;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth

    </div>

</header>

<!-- CONTENT -->
<main class="content">

    {{-- CATEGORY --}}
    <h2>Categories</h2>

    <div class="category-bar">

        <a href="{{ route('home') }}"
           class="category-card {{ !request('category') ? 'active' : '' }}">
            All
        </a>

        @foreach($categories as $category)
            <a href="?category={{ $category->id }}"
               class="category-card {{ request('category') == $category->id ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach

    </div>

    {{-- FILTERS --}}
    <form method="GET" class="filters">

        <input type="text"
               name="search"
               placeholder="Search products..."
               value="{{ request('search') }}">

        <select name="sort">
            <option value="">Sort</option>
            <option value="price">Price</option>
            <option value="name">Name</option>
        </select>

        @if(request('category'))
            <a href="{{ route('home') }}"
               style="padding:8px;background:#6b7280;color:white;text-decoration:none;">
                Reset
            </a>
        @endif

        <button type="submit">Apply</button>

    </form>

    {{-- PRODUCTS --}}
    <h2 style="margin-top:30px;">Products</h2>

    @if($products->count())

        <div class="grid">

            @foreach($products as $product)

                <a href="{{ route('product.show', $product->slug) }}"
                   class="card-link">

                    <div class="card">

                        <div class="img"></div>

                        <div class="title">
                            {{ $product->name }}
                        </div>

                        <div>
                            {{ $product->category->name ?? '-' }}
                        </div>

                        <div class="price">
                            ${{ $product->price }}
                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    @else
        <p>Нет товаров</p>
    @endif

</main>

<!-- FOOTER -->
<footer class="footer">
    My Shop © 2026
</footer>

</body>
</html>
