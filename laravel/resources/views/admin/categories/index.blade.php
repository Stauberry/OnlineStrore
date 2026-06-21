@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Categories</h1>

        <!-- ACTIONS -->
        <div style="margin-bottom:15px; display:flex; gap:10px; align-items:center;">

            <a href="{{ route('categories.create') }}"
               style="padding:8px 12px; background:green; color:white; text-decoration:none; border-radius:4px;">
                + Create
            </a>

            <a href="{{ route('categories.index') }}"
               style="padding:8px 12px; background:#6b7280; color:white; text-decoration:none; border-radius:4px;">
                Reset
            </a>

            <a href="?sort=id"
               style="padding:8px 12px; background:#374151; color:white; text-decoration:none; border-radius:4px;">
                Sort by ID
            </a>

            <a href="?sort=name"
               style="padding:8px 12px; background:#2563eb; color:white; text-decoration:none; border-radius:4px;">
                Sort by name
            </a>

        </div>

        <!-- TABLE -->
        <table style="width:100%; border-collapse:collapse; background:white;">
            <thead>
            <tr style="text-align:left; border-bottom:2px solid #ddd;">
                <th style="padding:10px;">ID</th>
                <th style="padding:10px;">Name</th>
                <th style="padding:10px;">Slug</th>
                <th style="padding:10px;">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr style="border-bottom:1px solid #eee;">
                    <td style="padding:10px;">{{ $category->id }}</td>
                    <td style="padding:10px;">{{ $category->name }}</td>
                    <td style="padding:10px;">{{ $category->slug }}</td>

                    <td style="padding:10px; white-space:nowrap;">

                        <a href="{{ route('categories.edit', $category->id) }}"
                           style="color:#2563eb; margin-right:10px;">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('categories.destroy', $category->id) }}"
                              style="display:inline;"
                              onsubmit="return confirm('Delete category?')">

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
