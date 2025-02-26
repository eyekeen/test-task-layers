@extends('layouts.app')

@section('content')
    <h1>Create New Article</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div>
            <label for="brief">Brief:</label>
            <textarea name="brief" id="brief">{{ old('brief') }}</textarea>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content">{{ old('content') }}</textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection