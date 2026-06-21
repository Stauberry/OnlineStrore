@extends('admin.layout')

@section('content')

    <div class="card">

        <h1>Edit Product</h1>

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom:10px;">
                <input name="name" value="{{ $product->name }}" placeholder="Name">
            </div>

            <div style="margin-bottom:10px;">
                <input name="price" value="{{ $product->price }}" placeholder="Price">
            </div>

            <div style="margin-bottom:10px;">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected($product->category_id == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    style="padding:8px 12px; background:#2563eb; color:white; border:none; border-radius:4px;">
                Update
            </button>

        </form>

    </div>

@endsection
