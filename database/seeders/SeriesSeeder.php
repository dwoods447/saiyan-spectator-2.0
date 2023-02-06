<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Series as Series;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        function import_series_csv($filePath){
            // Delete table values
            DB::table('series')->truncate();
            $csv = Reader::createFromPath($filePath, 'r');
            $stmt = (new Statement())
                ->offset(1);

            $row_count = 1;
            $records = $stmt->process($csv);
            $record_count = count($records);
            foreach ($records as $record) :
                $row = [
                    "series_id" => $record[0],
                    "series_name" => $record[1],
                    "short_code" => $record[2],
                ];
                echo " Inserting row : {$row_count} \r\n";
                $recordSaved = Series::firstOrCreate($row);
                if ($row_count == $record_count) {
                    echo "All {$record_count} rows inserted successfully";
                }
                $row_count++;
                if (!$recordSaved):
                    echo "Insert failed at row: {$row_count} \r\n";
                    echo "Please examine your data below: " . "\r\n\r\n\r\n";
                    echo "Series ID : {$record[0]} \r\n";
                    echo "Season Name : {$record[1]} \r\n";
                    echo "Short Code : {$record[2]} \r\n";
                    break;
                endif;

            endforeach;
        }


        $filePath = base_path() . '/database/seeds/series-import.csv';
        //Start import
        import_series_csv($filePath);
    }
}
