@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Products</h1>

        <!-- ACTIONS -->
        <div style="margin-bottom:15px; display:flex; gap:10px; align-items:center;">

            <a href="{{ route('products.create') }}"
               style="padding:8px 12px; background:green; color:white; text-decoration:none; border-radius:4px;">
                + Create Product
            </a>

            <a href="?sort=id"
               style="padding:8px 12px; background:#374151; color:white; text-decoration:none; border-radius:4px;">
                Sort by ID
            </a>

            <a href="?sort=name"
               style="padding:8px 12px; background:#2563eb; color:white; text-decoration:none; border-radius:4px;">
                Sort by name
            </a>

            <a href="?sort=price"
               style="padding:8px 12px; background:#f59e0b; color:white; text-decoration:none; border-radius:4px;">
                Sort by price
            </a>

            <a href="?sort=category"
               style="padding:8px 12px; background:#8b5cf6; color:white; text-decoration:none; border-radius:4px;">
                Sort by category
            </a>

            <a href="{{ route('products.index') }}"
               style="padding:8px 12px; background:#6b7280; color:white; text-decoration:none; border-radius:4px;">
                Reset
            </a>

        </div>

        <!-- FILTER -->
        <form method="GET" style="margin-bottom:15px; display:flex; gap:10px;">

            <select name="category" style="padding:6px;">
                <option value="">All categories</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(request('category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            <button type="submit"
                    style="padding:6px 12px; background:#2563eb; color:white; border:none;">
                Filter
            </button>

        </form>

        <!-- TABLE -->
        <table style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
            <tr style="background:#f3f4f6; text-align:left;">
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">Name</th>
                <th style="padding:12px;">Slug</th>
                <th style="padding:12px;">Category</th>
                <th style="padding:12px;">Price</th>
                <th style="padding:12px;">Image</th>
                <th style="padding:12px;">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr style="border-bottom:1px solid #eee;">

                    <td style="padding:12px;">{{ $product->id }}</td>

                    <td style="padding:12px; font-weight:600;">
                        {{ $product->name }}
                    </td>

                    <td style="padding:12px; color:#6b7280;">
                        {{ $product->slug }}
                    </td>

                    <td style="padding:12px;">
                        {{ $product->category->name ?? '-' }}
                    </td>

                    <td style="padding:12px;">
                        ${{ number_format($product->price, 2) }}
                    </td>

                    <td>
                        <img src="{{ $product->image_url }}" width="50" height="50" style="object-fit:cover;">
                    </td>

                    <td style="padding:12px; white-space:nowrap;">

                        <a href="{{ route('products.edit', $product->id) }}"
                           style="color:#2563eb; margin-right:10px;">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('products.destroy', $product->id) }}"
                              style="display:inline;"
                              onsubmit="return confirm('Delete product?')">

                            @csrf
                            @method('DELETE')

                            <button style="color:red; background:none; border:none; cursor:pointer;">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

@endsection
