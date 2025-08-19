<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
	*/
	// database/migrations/xxxx_xx_xx_xxxxxx_create_clubs_table.php

public function up(): void
{
    Schema::create('clubs', function (Blueprint $table) {
        $table->id(); // ID numerico auto-incrementante (es. 1, 2, 3...)
        $table->string('name'); // Una colonna di testo per il nome del club
        $table->string('city')->nullable(); // Una colonna per la città, nullable() significa che può essere lasciata vuota
        $table->timestamps(); // Aggiunge automaticamente le colonne `created_at` e `updated_at`
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
