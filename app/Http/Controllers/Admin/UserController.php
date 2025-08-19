<?php
// in app/Http/Controllers/Admin/UserController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
   // Recupera gli utenti dividendoli in due gruppi
    $pendingUsers = User::where('is_approved', false)->orderBy('created_at', 'desc')->get();
    $approvedUsers = User::where('is_approved', true)->orderBy('name')->get();

    return view('admin.users.index', compact('pendingUsers', 'approvedUsers'));
    }


    public function approve(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->route('admin.users.index')->with('status', 'Utente approvato con successo!');
    }
}
