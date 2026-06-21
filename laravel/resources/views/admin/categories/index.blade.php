@extends('admin.layout')

@section('content')

    <div class="card">

        <h1>Categories</h1>

        <div style="margin-bottom:15px; display:flex; gap:10px;">

            <a href="{{ route('categories.create') }}" class="btn btn-green">
                + Create
            </a>

            <a href="{{ route('categories.index') }}" class="btn btn-gray">
                Reset
            </a>

            <a href="?sort=id" class="btn btn-gray">
                Sort ID
            </a>

            <a href="?sort=name" class="btn btn-blue">
                Sort Name
            </a>

        </div>

        <table>

            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>

                    <td style="white-space:nowrap;">

                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="btn btn-blue">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('categories.destroy', $category->id) }}"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-red">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories</td>
                </tr>
            @endforelse

            </tbody>

        </table>

    </div>

@endsection
