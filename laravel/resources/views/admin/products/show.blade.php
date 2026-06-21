<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f3f4f6;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            gap: 30px;
        }

        .image {
            width: 400px;
            height: 400px;
            background: #eee;
            border-radius: 10px;
            object-fit: cover;
        }

        .info { flex: 1; }

        .title { font-size: 26px; font-weight: bold; }

        .price {
            font-size: 22px;
            margin-top: 10px;
            color: #16a34a;
        }

        .category {
            margin-top: 10px;
            color: #6b7280;
        }

        .desc {
            margin-top: 20px;
            color: #374151;
            line-height: 1.5;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        .back {
            display: inline-block;
            margin: 20px;
            text-decoration: none;
            color: #111827;
        }

        /* 🔥 NOTIFICATION */
        .added-box {
            padding: 15px;
            background: #ecfdf5;
            border: 1px solid #10b981;
            border-radius: 10px;
            margin-bottom: 20px;
            color: #065f46;
        }

        .continue-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<a href="{{ route('home') }}" class="back">← Back</a>

<div class="container">

    <div>
        @if($product->image)
            <img class="image" src="{{ asset('storage/' . $product->image) }}">
        @else
            <div class="image"></div>
        @endif
    </div>

    <div class="info">

        {{-- 🔥 SUCCESS MESSAGE --}}
        @if(session('added_product_id') == $product->id)

            <div class="added-box">

                ✔ Товар добавлен в корзину

                <br>

                Количество в корзине:
                <b>{{ session('added_quantity') }}</b>

                <br>

                <a href="{{ route('home') }}" class="continue-btn">
                    Continue shopping
                </a>

                <a href="{{ route('cart.index') }}" class="continue-btn" style="background:#16a34a;">
                    Go to cart
                </a>

            </div>

        @endif

        <div class="title">{{ $product->name }}</div>

        <div class="category">
            Category: {{ $product->category->name ?? '-' }}
        </div>

        <div class="price">${{ $product->price }}</div>

        <div class="desc">
            {{ $product->description ?? 'No description yet' }}
        </div>

        <form method="POST" action="{{ route('cart.add', $product->id) }}">
            @csrf

            <button type="submit" class="btn">
                Add to cart
            </button>
        </form>

    </div>

</div>

</body>
</html>
