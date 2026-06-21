@extends('admin.layout')

@section('content')

    <h1>Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <input name="name" placeholder="Name"><br><br>
        <input name="price" placeholder="Price"><br><br>

        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Save</button>
        <p>
            <a style="color:black;" href="/admin/products">Назад</a>
        </p>
    </form>
    @if ($errors->any())
        <div style="background:#fee2e2; padding:10px; margin-bottom:10px; color:#991b1b;">
            <ul style="margin:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
