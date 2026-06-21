@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Create Category</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div style="margin-bottom:10px;">
                <input type="text" name="name" placeholder="Name">
            </div>

            <button type="submit">Save</button>
        </form>

        <p>
            <a style="color:black;" href="/admin/categories">Назад</a>
        </p>
    </div>
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
