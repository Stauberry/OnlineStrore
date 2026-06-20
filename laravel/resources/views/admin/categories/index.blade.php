@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}"
           style="display:inline-block; margin-bottom:10px; padding:8px 12px; background:green; color:white; text-decoration:none;">
            + Create
        </a>

        <ul>
            @foreach($categories as $category)
                <li>
                    {{ $category->name }} ({{ $category->slug }})
                </li>
            @endforeach
        </ul>

    </div>

@endsection
