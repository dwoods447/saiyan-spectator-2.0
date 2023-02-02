<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Season as Season;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        function  import_seasons_csv($filePath){
            // Delete table values
            DB::table('seasons')->truncate();
            $csv = Reader::createFromPath($filePath, 'r');
            $stmt = (new Statement())
                ->offset(1);

            $row_count = 1;
            $records = $stmt->process($csv);
            $record_count = count($records);
            foreach ($records as $record) :
                $row = [
                    "season_id" => $record[0],
                    "season_number" => $record[1],
                    "season_title" => $record[2],
                    "series_id" => $record[3],

                ];
                echo " Inserting row : {$row_count} \r\n";
                $recordSaved = Season::firstOrCreate($row);
                if ($row_count == $record_count) {
                    echo "All {$record_count} rows inserted successfully";
                }
                $row_count++;
                if (!$recordSaved):
                    echo "Insert failed at row: {$row_count} \r\n";
                    echo "Please examine your data below: " . "\r\n\r\n\r\n";
                    echo "Season ID : {$record[0]} \r\n";
                    echo "Season Number : {$record[1]} \r\n";
                    echo "Season Title: {$record[2]} \r\n";
                    echo "Series ID: {$record[3]} \r\n";
                    break;
                endif;

            endforeach;
        }

        $filePath = base_path() . '/database/seeds/seasons-import.csv';
        //Start import
        import_seasons_csv($filePath);

    }
}
