<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Mostra la dashboard dell'applicazione.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = [];

        // Calcola le statistiche solo se l'utente autenticato è un admin.
        if (Gate::allows('is-admin')) {
            $stats = [
                'totalUsers' => User::count(),
                'pendingUsers' => User::where('is_approved', false)->count(),
            ];
        }

        // Restituisce la vista 'dashboard' passando l'array $stats.
        // Se l'utente non è un admin, l'array sarà vuoto.
        return view('dashboard', ['stats' => $stats]);
    }
}
