<?php

namespace App\Http\Controllers;

use App\Models\User; // Aggiungi questo in cima
use App\Models\clubs;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(clubs $clubs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clubs $clubs)
    {
        // Recupera tutti gli utenti approvati che NON sono admin
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
    public function update(Request $request, clubs $clubs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clubs $clubs)
    {
        //
    }
}
