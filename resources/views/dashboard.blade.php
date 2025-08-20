@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    {{-- Questo blocco di codice è visibile solo agli utenti con il ruolo di 'admin' --}}
    @can('is-admin')

       <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Utenti Totali</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['totalUsers'] }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Utenti in Attesa di Approvazione</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pendingUsers'] }}</div>
                    </div>
                </div>
                @if ($stats['pendingUsers'] > 0)
                <div class="mt-2">
                     <a href="{{ route('admin.users.index') }}" class="text-warning small">Vai alla pagina di approvazione →</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
    @else

        {{-- Questo blocco è visibile a tutti gli altri utenti (non admin) --}}
        <div class="card shadow">
            <div class="card-body">
                Benvenuto nella tua area personale!
            </div>
        </div>

    @endcan
</div>

{{-- Questi stili sono specifici per le card della dashboard --}}
<style>
    .card .border-left-primary { border-left: .25rem solid #4e73df !important; }
    .card .border-left-success { border-left: .25rem solid #1cc88a !important; }
    .card .border-left-warning { border-left: .25rem solid #f6c23e !important; }
    .text-xs { font-size: .7rem; }
</style>
@endsection
