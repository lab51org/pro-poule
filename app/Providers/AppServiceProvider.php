<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User; // Assicurati di importare il modello User
use Illuminate\Support\Facades\Gate; // Assicurati di importare Gate

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
// Definisce un "gate" chiamato 'is-admin'
    // Ritorna true se l'utente autenticato ha il ruolo 'admin', altrimenti false
    Gate::define('is-admin', function (User $user) {
        return $user->role === 'admin';
    });
    }}
