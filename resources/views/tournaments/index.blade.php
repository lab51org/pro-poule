@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">{{ __('I Miei Tornei')}}</h1>
            <a href="{{ route('tournaments.create') }}" class="btn btn-primary">Crea Nuovo Torneo</a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome Torneo</th>
                        <th>Tipo di Gioco</th>
                        <th>Data</th>
                        <th>Stato</th>
                        <th>Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($tournaments as $tournament)
                        <tr>
                            <td>{{ $tournament->name }}</td>
                            <td>{{ $tournament->gameType->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($tournament->tournament_date)->format('d/m/Y') }}</td>
                            <td><span class="badge bg-secondary">{{ $tournament->status }}</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Gestisci</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Non hai ancora creato nessun torneo.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
