<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rotta pubblica per la pagina di benvenuto (o reindirizzamento)
Route::get('/', function () {
    // Come da consiglio precedente, reindirizziamo gli utenti
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

// Gruppo principale per tutti gli utenti che hanno fatto il login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rotta per la Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Rotte per la gestione del Profilo
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotte per la gestione dei Club (accessibili a tutti gli utenti loggati)
    Route::resource('clubs', ClubController::class);
    
    // Sotto-gruppo accessibile SOLO agli amministratori
    Route::middleware('can:is-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/approve', [AdminUserController::class, 'approve'])->name('users.approve');
    });

});

// Include le rotte per l'autenticazione (login, register, etc.)
require __DIR__.'/auth.php';
