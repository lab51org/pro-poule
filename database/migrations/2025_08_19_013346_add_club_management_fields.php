<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Aggiungiamo una colonna 'manager_id' alla tabella dei club
        Schema::table('clubs', function (Blueprint $table) {
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('set null');
        });

        // Aggiungiamo una colonna 'club_id' alla tabella degli utenti
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('club_id')->nullable()->constrained('clubs')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropForeign(['manager_id']);
            $table->dropColumn('manager_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->dropColumn('club_id');
        });
    }
};
