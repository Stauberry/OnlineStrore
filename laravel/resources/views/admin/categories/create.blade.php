@extends('admin.layout')

@section('content')

    <div class="card">

        <h1>Create Category</h1>

        {{-- ERRORS --}}
        @if ($errors->any())
            <div style="background:#fee2e2; padding:10px; margin-bottom:15px; color:#991b1b;">
                <ul style="margin:0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div style="margin-bottom:10px;">
                <input type="text" name="name" placeholder="Category name"
                       style="padding:8px; width:300px;">
            </div>

            <button type="submit"
                    style="padding:8px 12px; background:green; color:white; border:none; cursor: pointer;">
                Save
            </button>
        </form>

        <div style="margin-top:15px;">
            <a href="{{ route('categories.index') }}">← Back</a>
        </div>

    </div>

@endsection
