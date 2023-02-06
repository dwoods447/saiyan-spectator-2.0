<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Character as Character;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        function  import_character_csv($filePath){
            DB::table('characters')->truncate();
            $csv = Reader::createFromPath($filePath, 'r');
            $stmt = (new Statement())
                ->offset(1);

            $row_count = 1;
            $records = $stmt->process($csv);
            $record_count = count($records);

            foreach ($records as $record) :
                $row = [
                    "id" => $record[0],
                    "character_name" => $record[1],
                    "short_name" => $record[2],
                    "race" => $record[3],
                    "gender" => $record[4],
                    "height" => $record[5],
                    "rivals" => $record[6],
                    "allies" => $record[7],
                    "year_of_birth" => $record[8],
                    "residence" => $record[9],
                    "creator" => $record[10],
                    "forms" => $record[11],
                    "bio" => $record[12],
                    "profile_image" => $record[13],
                    "hero_image" => $record[14],
                ];
                echo " Inserting row  : {$row_count} \r\n";
                $recordSaved = Character::firstOrCreate($row);
               
                $row_count++;
                if(!$recordSaved):
                    echo  "Insert failed at row: {$row_count} \r\n";
                    echo  "Please examine your data below:  \r\n\r\n\r\n";
                    echo  "Character Name : {$record[0]}\r\n";
                    echo  "Short Name : {$record[1]}\r\n";
                    echo  "Race: {$record[2]}\r\n";
                    echo  "Gender: {$record[3]}\r\n";
                    echo  "Height: {$record[4]}\r\n";
                    echo  "Rivals: {$record[5]}\r\n";
                    echo  "Allies: {$record[6]}\r\n";
                    echo  "Year of Birth: {$record[7]}\r\n";
                    echo  "Residence: {$record[8]}\r\n";
                    echo  "Creator: {$record[9]}\r\n";
                    echo  "Forms: {$record[10]}\r\n";
                    echo  "Bio: {$record[11]}\r\n";
                    echo  "Profile Image: {$record[12]}\r\n";
                    echo  "Hero Image: {$record[13]}\r\n";

                    break;
                endif;
            endforeach;    
        }

        $filePath = base_path(). '/database/seeds/characters-import.csv';
        //Start import
        $file  = mb_convert_encoding($filePath, 'UTF-8');
        import_character_csv($file);
   }
}
