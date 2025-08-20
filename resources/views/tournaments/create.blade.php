@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Crea Nuovo Torneo: Step 1 di 4</h1>

        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Impostazioni Principali</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tournaments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Torneo</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="game_type_id" class="form-label">Tipo di Gioco</label>
                        <select class="form-select" id="game_type_id" name="game_type_id" required>
                            <option value="" disabled selected>Seleziona un tipo...</option>
                            @foreach ($gameTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tournament_date" class="form-label">Data e Ora di Inizio</label>
                        <input type="datetime-local" class="form-control" id="tournament_date" name="tournament_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Luogo (Opzionale)</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>

                    <button type="submit" class="btn btn-primary">Avanti: Aggiungi Partecipanti</button>
                    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Annulla</a>
                </form>
            </div>
        </div>
    </div>
@endsection
