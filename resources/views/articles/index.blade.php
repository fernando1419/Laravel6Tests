@extends('layout')

@section('content')
    <h3>
        Fancy display heading
        <small class="text-muted">With faded secondary text</small>
    </h3>
<ul>
        @foreach ($articles as $article )
            <li> {{ $article->title }} </li>
        @endforeach
    </ul>
@endsection

