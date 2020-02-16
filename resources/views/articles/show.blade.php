@extends('layout')

@section('content')

    <div class="card-columns">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="card-title"> {{ $article->title }} </h4>
            </div>
            <div class="card-body">
                <p class="card-text"> Published: {{ $article->published_at }} </p>
                <p class="card-text"> {{ $article->description }} </p>
            </div>
        </div>
    </div>

    <a href="{{ route('articles.index') }}">Go Back to Articles</a>

@endsection
