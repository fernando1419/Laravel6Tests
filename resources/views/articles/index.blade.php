@extends('layout')

@section('content')
    <h3> List of Articles </h3>
    <ul>
        @forelse ($articles as $article)
            <li> {{ $article->title }} </li>
        @empty
            <p> No Articles to display yet. </p>
        @endforelse
    </ul>
@endsection

