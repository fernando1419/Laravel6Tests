@extends('layout')

@section('content')

    <div class="wrapper">

        <div class="container">

            <h4>New Article</h4>

            <form action="{{ route('articles.store') }}" method="POST">
                @csrf

                @include('articles._form', ['submitButtonText' => 'Create Article'])

            </form>

        </div>

    </div>
@endsection
