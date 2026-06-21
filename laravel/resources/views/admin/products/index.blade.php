@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Products</h1>

        <a href="{{ route('products.create') }}"
           style="display:inline-block; margin-bottom:15px; padding:8px 12px; background:green; color:white; text-decoration:none;">
            + Create Product
        </a>

        <table style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
            <tr style="background:#f3f4f6; text-align:left;">
                <th style="padding:12px; border-bottom:1px solid #ddd;">ID</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Name</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Category</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Price</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr style="border-bottom:1px solid #eee;">
                    <td style="padding:12px;">{{ $product->id }}</td>

                    <td style="padding:12px; font-weight:600;">
                        {{ $product->name }}
                    </td>

                    <td style="padding:12px;">
                        {{ $product->category->name ?? '-' }}
                    </td>

                    <td style="padding:12px;">
                        ${{ number_format($product->price, 2) }}
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
