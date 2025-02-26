@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p><strong>Author:</strong> {{ $article->author ?? 'Аноним' }}</p>
    <p>{!! nl2br(e($article->content)) !!}</p>
@endsection