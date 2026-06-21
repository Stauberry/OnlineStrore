@extends('admin.layout')

@section('content')

    <div class="card">

        <h1>Edit Category</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom:10px;">
                <input type="text" name="name" value="{{ $category->name }}"
                       style="padding:8px; width:300px;">
            </div>

            <button type="submit"
                    style="padding:8px 12px; background:#2563eb; color:white; border:none; cursor: pointer;">
                Update
            </button>
        </form>

        <div style="margin-top:15px;">
            <a href="{{ route('categories.index') }}">← Back</a>
        </div>

    </div>

@endsection
