@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Gestione Utenti</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Utenti in attesa di approvazione</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                {{-- ... la tabella degli utenti da approvare che già avevi ... --}}
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Utenti Approvati</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ruolo</th>
                        <th>Club</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($approvedUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{-- Qui mostreremo il nome del club in futuro --}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nessun utente approvato.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
