@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>Update Article</h4>

            <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST">
                @csrf
                @method('PUT')

                @include('articles._form', ['submitButtonText' => 'Update Article'])

                <a href="{{ route('articles.show', $article) }} " class="btn btn-warning form-control-sm">Cancel</a>

            </form>

        </div>

    </div>
@endsection
