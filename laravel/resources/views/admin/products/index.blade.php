@extends('admin.layout')

@section('content')

    <div class="card">

        <h1 style="margin-bottom:15px;">Products</h1>

        <!-- ACTIONS -->
        <div style="margin-bottom:15px; display:flex; gap:10px; flex-wrap:wrap;">

            <a href="{{ route('products.create') }}"
               style="padding:8px 12px; background:green; color:white; text-decoration:none; border-radius:4px;">
                + Create
            </a>

            <a href="?sort=id"
               style="padding:8px 12px; background:#374151; color:white; text-decoration:none; border-radius:4px;">
                ID
            </a>

            <a href="?sort=name"
               style="padding:8px 12px; background:#2563eb; color:white; text-decoration:none; border-radius:4px;">
                Name
            </a>

            <a href="?sort=price"
               style="padding:8px 12px; background:#f59e0b; color:white; text-decoration:none; border-radius:4px;">
                Price
            </a>

            <a href="?sort=category"
               style="padding:8px 12px; background:#8b5cf6; color:white; text-decoration:none; border-radius:4px;">
                Category
            </a>

            <a href="{{ route('products.index') }}"
               style="padding:8px 12px; background:#6b7280; color:white; text-decoration:none; border-radius:4px;">
                Reset
            </a>

        </div>

        <!-- FILTER -->
        <form method="GET" style="margin-bottom:15px; display:flex; gap:10px; align-items:center;">

            <select name="category" style="padding:6px; cursor: pointer">
                <option value="">All categories</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit"
                    style="padding:6px 12px;
                    background:#2563eb;
                    color:white;
                    border:none;
                    border-radius:4px;
                    cursor: pointer">
                Filter
            </button>

        </form>

        <!-- TABLE -->
        <table style="width:100%; border-collapse:collapse; background:white;">

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
            @forelse($products as $product)
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

                    <td style="padding:12px;">
                        <img src="{{ $product->image_url ?? asset('images/default.png') }}"
                             width="45" height="45"
                             style="object-fit:cover; border-radius:6px;">
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
            @empty
                <tr>
                    <td colspan="7" style="padding:20px; text-align:center; color:#6b7280;">
                        No products
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>

@endsection
