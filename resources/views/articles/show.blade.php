@extends('layout')

@section('content')

    <div class="card-columns">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="card-title"> {{ $article->title }} </h5>
            </div>
            <div class="card-body">
                <p class="card-text"> Author: {{ $author->name }} </p>
                <p class="card-text"> Published: {{ $article->published_at }} </p>
                <p class="card-text"> {{ $article->description }} </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('articles.edit', ['article' => $article->id]) }}">Edit this article</a>
                <form method="POST" action="{{ route('articles.destroy', $article) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <a href="{{ route('articles.index') }}">Go Back to Articles</a>

@endsection
