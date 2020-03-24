@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>You are logged in!</h3>
                    @if (@Auth::user()->hasRole('client'))
                        <h3> Eres un usuario con el rol de Cliente </h3>
                    @elseif (auth()->user()->hasRole('reader'))
                        <h3> Eres un usuario con el rol de Lector </h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
