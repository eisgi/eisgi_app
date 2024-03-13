<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use App\Models\Filiere;

class ImportCsvData extends Command
{
    protected $signature = 'import:csv {file}';

    protected $description = 'Import data from a CSV file';

    public function handle()
    {
        $file = $this->argument('file');

        try {
            $csv = Reader::createFromPath($file, 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();

            DB::beginTransaction();

            $importedCount = 0;

            foreach ($data as $row) {
                if (isset($row['codeFiliere']) && isset($row['libelleFiliere'])) {
                    Filiere::create([
                        'codeFiliere' => $row['codeFiliere'],
                        'libelleFiliere' => $row['libelleFiliere']
                    ]);
                    $importedCount++;
                }
            }

            DB::commit();

            $this->info("$importedCount record(s) ont été importé(s) avec succès.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Une erreur s\'est produite lors de l\'importation des données.');
            $this->error($e->getMessage());
        }
    }
}