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
    Schema::table('users', function (Blueprint $table) {
        // Aggiunge la colonna per il ruolo, con 'user' come valore predefinito
        $table->string('role')->default('user');

        // Aggiunge la colonna booleana per l'approvazione, con 'false' (0) come valore predefinito
        $table->boolean('is_approved')->default(false);
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
