<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddTranslationString extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:add {key} {value} {--lang=it}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new key-value pair to a language JSON file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lang = $this->option('lang');
        $key = $this->argument('key');
        $value = $this->argument('value');
        $filePath = resource_path("lang/{$lang}.json");

        // Leggi o inizializza il contenuto del file JSON
        $translations = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

        // Verifica se la chiave esiste già
        if (array_key_exists($key, $translations)) {
            $this->warn("La chiave '{$key}' esiste già. Il suo valore sarà sovrascritto.");
        }

        // Aggiungi la nuova coppia chiave-valore
        $translations[$key] = $value;

        // Ordina le chiavi in ordine alfabetico per mantenere il file pulito
        ksort($translations);

        // Salva il file JSON aggiornato
        File::put($filePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("Stringa di traduzione aggiunta con successo al file {$lang}.json:");
        $this->line("Chiave: {$key}");
        $this->line("Valore: {$value}");

        return Command::SUCCESS;
    }
}
