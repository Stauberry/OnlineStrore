<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>

    <style>
        body {
            font-family: Arial;
            background:#f3f4f6;
            margin:0;
            padding:20px;
        }

        .top-bar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .back {
            text-decoration:none;
            color:#111827;
            font-weight:bold;
        }

        .item {
            background:white;
            padding:15px;
            margin-bottom:10px;
            border-radius:10px;
        }

        .row {
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap: 10px;
        }

        input {
            width:60px;
            padding:5px;
        }

        button {
            border:none;
            cursor:pointer;
            padding:6px 10px;
            border-radius:6px;
        }

        .btn-remove {
            background:red;
            color:white;
        }

        .btn-update {
            background:green;
            color:white;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="top-bar">
    <h1>Cart</h1>

    <a href="{{ route('home') }}" class="back">
        ← Continue shopping
    </a>
</div>

@if(count($cart))

    {{-- IMPORTANT: используем KEY как id --}}
    <form method="POST" action="{{ route('cart.update') }}">
        @csrf

        @foreach($cart as $key => $item)

            <div class="item">

                <div class="row">

                    <div>
                        <strong>{{ $item['name'] }}</strong><br>
                        ${{ $item['price'] }}
                    </div>

                    <input type="number"
                           name="quantity[{{ $item['id'] }}]"
                           value="{{ $item['quantity'] }}"
                           min="1">

                    {{-- REMOVE FORM (отдельный, без вложенности) --}}
                    <form method="POST"
                          action="{{ route('cart.remove', $key) }}">
                        @csrf

                        <button type="submit" class="btn-remove">
                            Remove
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

        {{-- вместо "update cart" можно оставить как checkout --}}
        <button type="submit" class="btn-update">
            Go to checkout
        </button>

    </form>

    <h2>Total: ${{ $total }}</h2>

@else
    <p>Cart is empty</p>
@endif

</body>
</html>
