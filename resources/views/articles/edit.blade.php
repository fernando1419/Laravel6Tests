@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>Update Article</h4>

            <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm" name="title" placeholder="title" required="required" value="{{ $article->title }}">
                </div>

                 <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control form-control-sm" name="description" rows="3" placeholder="Description" required="required">{{ $article->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published Date</label>
                    <input type="date" class="form-control form-control-sm" required="required" name="published_at" max="{{ date('Y-m-d') }}" value="{{ $article->published_at }}">
                </div>

                <button type="submit" class="btn btn-primary form-control-sm">Update</button>
                <a href="{{ url()->previous() }} " class="btn btn-warning form-control-sm">Cancel</a>

            </form>

        </div>

    </div>
@endsection
