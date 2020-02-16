@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>New Article</h4>

            <form action="{{ route('articles.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control form-control-sm @error('title') is-invalid @enderror"
                           type="text"
                           name="title"
                           placeholder="title"
                           value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                    @enderror
                </div>

                 <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $errors->first('description') }} </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Published Date</label>
                    <input class="form-control form-control-sm @error('published_at') is-invalid @enderror"
                           type="date"
                           name="published_at"
                           max="{{ date('Y-m-d') }}"
                           value="{{ old('published_at') }}" >
                    @error('published_at')
                        <p class="text-danger">{{ $errors->first('published_at') }} </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary form-control-sm">Create Article</button>

            </form>

        </div>

    </div>
@endsection
