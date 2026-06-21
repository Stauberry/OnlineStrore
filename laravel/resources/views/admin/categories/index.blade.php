@extends('admin.layout')

@section('content')

    <div style="background:white; padding:20px; border-radius:8px;">

        <h1>Categories</h1>

        <!-- CREATE -->
        <a href="{{ route('categories.create') }}"
           style="display:inline-block; margin-bottom:15px; padding:8px 12px; background:green; color:white; text-decoration:none;">
            + Create
        </a>

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

                    <td style="padding:10px;">

                        <!-- EDIT -->
                        <a href="{{ route('categories.edit', $category->id) }}"
                           style="color:blue; margin-right:10px;">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form method="POST"
                              action="{{ route('categories.destroy', $category->id) }}"
                              style="display:inline;"
                              onsubmit="return confirm('Delete this category?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="color:red; background:none; border:none; cursor:pointer;">
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
