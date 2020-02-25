@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>New Article</h4>

            <form action="{{ route('articles.store') }}" method="POST">
                @csrf

                @include('articles._form', ['submitButtonText' => 'Create Article'])

                <a href="{{ route('articles.index') }}" class="btn btn-dark form-control-sm">Go Back to Articles</a>
            </form>


        </div>

    </div>
@endsection
