<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class ScanTranslationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:scan {--clear : Clear the it.json file before scanning}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scans the project for new translation strings and adds them to the it.json file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = resource_path('lang/it.json');
        $newStringsCount = 0;

        // Verifica se l'opzione --clear è stata usata e se l'ambiente è di sviluppo
        if ($this->option('clear') && config('app.env') === 'local') {
            File::put($filePath, '{}');
            $this->info('File it.json svuotato.');
        }

        if (File::exists($filePath) && File::get($filePath)) {
            $translations = json_decode(File::get($filePath), true);
            if (!is_array($translations)) {
                $translations = [];
            }
        } else {
            $translations = [];
        }

        $this->info("Scansione del progetto per le stringhe di traduzione...");

        $finder = (new Finder())->in([
                                    base_path('app'),
                                    base_path('resources/views')
                                ])
                                ->name('*.php')
                                ->name('*.blade.php')
                                ->exclude('Console/Commands');

        foreach ($finder as $file) {
            $contents = $file->getContents();
            $relativePath = $file->getRelativePathname();

            preg_match_all("/__\(['\"]([^.'\"].+?)['\"],?.*\)|@lang\(['\"]([^.'\"].+?)['\"],?.*\)/", $contents, $matches);

            foreach ($matches[1] as $match) {
                if ($match && !array_key_exists($match, $translations)) {
                    $translations[$match] = $match;
                    $newStringsCount++;
                    $this->line("Aggiunta: \"{$match}\" nel file: {$relativePath}");
                }
            }
            foreach ($matches[2] as $match) {
                if ($match && !array_key_exists($match, $translations)) {
                    $translations[$match] = $match;
                    $newStringsCount++;
                    $this->line("Aggiunta: \"{$match}\" nel file: {$relativePath}");
                }
            }
        }

        ksort($translations);

        File::put($filePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("Scansione completata. Aggiunte {$newStringsCount} nuove stringhe al file it.json.");

        return Command::SUCCESS;
    }
}
