<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
    {
        // Rimuove la colonna 'club_id' dalla tabella 'users'
        Schema::table('users', function (Blueprint $table) {
            // Controlliamo se la colonna esiste prima di provare a rimuoverla
            if (Schema::hasColumn('users', 'club_id')) {
                // In alcuni database, è necessario rimuovere prima la chiave esterna
                $table->dropForeign(['club_id']);
                $table->dropColumn('club_id');
            }
        });

        // Elimina completamente la tabella 'clubs'
        Schema::dropIfExists('clubs');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
