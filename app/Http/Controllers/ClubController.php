<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
	    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // 1. Recupera tutti i club dal database, ordinandoli dal più recente
    $clubs = Club::latest()->get();

    // 2. Restituisce la vista e le passa i dati dei club
    return view('clubs.index', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
	// Questo metodo mostra semplicemente la pagina con il form di creazione
    return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Valida i dati inviati dal form
    $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'nullable|string|max:255',
    ]);

    // 2. Se la validazione ha successo, crea il nuovo club nel database
    Club::create([
        'name' => $request->name,
        'city' => $request->city,
    ]);

    // 3. Reindirizza l'utente alla pagina della lista con un messaggio di successo
    return redirect()->route('clubs.index')->with('status', 'Club creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        $this->authorize('update', $club);

        $potentialManagers = User::where('role', '!=', 'admin')
                                 ->where('is_approved', true)
                                 ->orderBy('name')
                                 ->get();

        return view('clubs.edit', [
            'club' => $club,
            'potentialManagers' => $potentialManagers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
	        $this->authorize('update', $club); // <-- Controlla i permessi
// 1. Valida i dati
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'nullable|string|max:255',
        'manager_id' => 'nullable|exists:users,id' // Verifica che l'utente esista
    ]);

    // 2. Aggiorna il club
    $club->update($validated);

    // Se è stato scelto un manager, assicurati che il suo club_id sia corretto
    if ($validated['manager_id']) {
        User::find($validated['manager_id'])->update(['club_id' => $club->id]);
    }

    // 3. Reindirizza
    return redirect()->route('clubs.index')->with('status', 'Club aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        // Il Route Model Binding ci fornisce già il club da eliminare.
    $club->delete();

    // Reindirizza alla lista con un messaggio di successo.
    return redirect()->route('clubs.index')->with('status', 'Club eliminato con successo!');
}   
}
