@extends('layouts.guest')

@section('content')
    <div class="text-center">
        <h1 class="display-4">App Tornei Pétanque</h1>
        <p class="lead">La piattaforma per gestire i tuoi tornei in modo semplice ed efficace.</p>
        <hr class="my-4">
        <p>Accedi o registrati per iniziare.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Accedi</a>
        <a class="btn btn-secondary btn-lg" href="{{ route('register') }}" role="button">Registrati</a>
    </div>
@endsection
