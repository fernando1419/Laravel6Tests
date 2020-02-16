@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>New Article</h4>

            <form action="{{ route('articles.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm" name="title" placeholder="title" required="required">
                </div>

                 <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control form-control-sm" name="description" rows="3" placeholder="Description" required="required"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published Date</label>
                    <input type="date" class="form-control form-control-sm" required="required" name="published_at" max="{{ date('Y-m-d') }}">
                </div>

                <button type="submit" class="btn btn-primary form-control-sm">Create Article</button>

            </form>

        </div>

    </div>
@endsection
