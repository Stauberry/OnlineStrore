@extends('admin.layout')

@section('content')

    <h1>Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $product->name }}"><br><br>
        <input name="slug" value="{{ $product->slug }}"><br><br>
        <input name="price" value="{{ $product->price }}"><br><br>

        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        @if($product->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Update</button>
    </form>

@endsection
