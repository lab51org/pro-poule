<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:translate {source_lang} {--target_langs= : Comma-separated list of target languages (e.g., en,fr)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translates a source language JSON file into one or more target language files.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sourceLang = $this->argument('source_lang');
        $targetLangs = explode(',', $this->option('target_langs'));

        $sourceFile = resource_path("lang/{$sourceLang}.json");

        // Verifica che il file di origine esista
        if (!File::exists($sourceFile)) {
            $this->error("Il file di origine '{$sourceFile}' non esiste.");
            return Command::FAILURE;
        }

        // Decodifica il JSON di origine
        $sourceData = json_decode(File::get($sourceFile), true);

        foreach ($targetLangs as $targetLang) {
            $translatedData = [];
            $tr = new GoogleTranslate();
            $tr->setSource($sourceLang);
            $tr->setTarget($targetLang);

            $this->info("Traduzione in corso per: {$targetLang}...");

            foreach ($sourceData as $key => $value) {
                try {
                    $translation = $tr->translate($value);
                    $translatedData[$key] = $translation;
                    $this->line("Tradotto: '{$value}' -> '{$translation}'");
                } catch (\Exception $e) {
                    $this->error("Errore durante la traduzione: " . $e->getMessage());
                    return Command::FAILURE;
                }
            }

            // Salva il file tradotto
            $targetFile = resource_path("lang/{$targetLang}.json");
            File::put($targetFile, json_encode($translatedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            $this->info("Traduzione per {$targetLang} completata e salvata in {$targetFile}");
        }

        $this->info("Tutte le traduzioni sono state completate con successo!");
        return Command::SUCCESS;
    }
}
