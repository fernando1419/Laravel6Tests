@extends('layout')

@section('content')
    <h3> List of Articles </h3>
    <ul>
        @forelse ($articles as $article)
        <a href="{{ route('articles.show', ['article' => $article->id]) }}"> <li> {{ $article->title }} </li> </a>
        @empty
        <p> No Articles to display yet. </p>
        @endforelse
    </ul>
@endsection

