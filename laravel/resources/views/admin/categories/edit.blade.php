@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Edit Category</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $category->name }}">
            <input type="text" name="slug" value="{{ $category->slug }}">

            <button type="submit">Update</button>
        </form>

    </div>

@endsection
