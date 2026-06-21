@extends('admin.layout')

@section('content')

    <div class="card">

        <h1>Create Product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div style="margin-bottom:10px;">
                <input name="name" placeholder="Name">
            </div>

            <div style="margin-bottom:10px;">
                <input name="price" placeholder="Price">
            </div>

            <div style="margin-bottom:10px;">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    style="padding:8px 12px; background:green; color:white; border:none; border-radius:4px;">
                Save
            </button>

            <a href="{{ route('products.index') }}"
               style="margin-left:10px; color:#111;">
                Back
            </a>

        </form>

        @if ($errors->any())
            <div style="margin-top:15px; background:#fee2e2; padding:10px; color:#991b1b;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

    </div>

@endsection
