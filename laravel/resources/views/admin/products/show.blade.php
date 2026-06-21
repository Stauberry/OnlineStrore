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

        .info {
            flex: 1;
        }

        .title {
            font-size: 26px;
            font-weight: bold;
        }

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
    </style>
</head>
<body>

<a href="{{ route('home') }}" class="back">← Back</a>

<div class="container">

    {{-- IMAGE --}}
    <div>
        @if($product->image)
            <img class="image" src="{{ asset('storage/' . $product->image) }}">
        @else
            <div class="image"></div>
        @endif
    </div>

    {{-- INFO --}}
    <div class="info">

        <div class="title">
            {{ $product->name }}
        </div>

        <div class="category">
            Category: {{ $product->category->name ?? '-' }}
        </div>

        <div class="price">
            ${{ $product->price }}
        </div>

        <div class="desc">
            {{ $product->description ?? 'No description yet' }}
        </div>

        <button class="btn">
            Add to cart
        </button>

    </div>

</div>

</body>
</html>
