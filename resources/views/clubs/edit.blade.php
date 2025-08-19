@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Modifica Club</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dettagli Club</h6>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form method="POST" action="{{ route('clubs.update', $club) }}">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $club->name) }}" required autofocus />
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Città</label>
                    <input id="city" class="form-control" type="text" name="city" value="{{ old('city', $club->city) }}" />
                </div>
<div class="mb-3">
    <label for="manager_id" class="form-label">Manager del Club</label>
    <select id="manager_id" name="manager_id" class="form-select">
        <option value="">Nessun manager</option>
        @foreach ($potentialManagers as $manager)
            <option value="{{ $manager->id }}" @selected(old('manager_id', $club->manager_id) == $manager->id)>
                {{ $manager->name }} ({{ $manager->email }})
            </option>
        @endforeach
    </select>
</div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('clubs.index') }}" class="btn btn-secondary me-2">Annulla</a>
                    <button type="submit" class="btn btn-primary">
                        Aggiorna Club
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
