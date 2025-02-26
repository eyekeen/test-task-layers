@extends('layouts.app')

@section('content')
    <h1>Articles</h1>
    @foreach ($articles as $article)
        <div>
            <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
            <p><strong>Author:</strong> {{ $article->author ?? 'Аноним' }}</p>
            <p>{{ $article->brief }}</p>
        </div>
    @endforeach

    {{ $articles->links('pagination::bootstrap-5') }}
@endsection