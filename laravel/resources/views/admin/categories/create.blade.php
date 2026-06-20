@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Create Category</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div style="margin-bottom:10px;">
                <input type="text" name="name" placeholder="Name">
            </div>

            <div style="margin-bottom:10px;">
                <input type="text" name="slug" placeholder="Slug">
            </div>

            <button type="submit">Save</button>
        </form>

    </div>

@endsection
