@extends('admin.layout')

@section('content')

    <h1>Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <input name="name" placeholder="Name"><br><br>
        <input name="slug" placeholder="Slug"><br><br>
        <input name="price" placeholder="Price"><br><br>

        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Save</button>
    </form>

@endsection
