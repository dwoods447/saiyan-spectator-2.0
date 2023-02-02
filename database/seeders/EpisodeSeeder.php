<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Episode as Episode;
use Illuminate\Support\Facades\DB;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        function utfStringReplacer($captures) {
            if ($captures[1] != "") {
                // Valid byte sequence. Return unmodified.
                return $captures[1];
            }
            elseif ($captures[2] != "") {
                // Invalid byte of the form 10xxxxxx.
                // Encode as 11000010 10xxxxxx.
                return "\xC2 {$captures[2]}";
            }
            else {
                // Invalid byte of the form 11xxxxxx.
                // Encode as 11000011 10xxxxxx.
                return "\xC3 {chr(ord($captures[3])-64)}";
            }
        }

                    function escape_string_for_sql($input){
                        $regex =<<<HEREDOC
                        /
                         (
                            (?: [\x00-\x7F]               # single-byte sequences   0xxxxxxx
                            |   [\xC0-\xDF][\x80-\xBF]    # double-byte sequences   110xxxxx 10xxxxxx
                            |   [\xE0-\xEF][\x80-\xBF]{2} # triple-byte sequences   1110xxxx 10xxxxxx * 2
                            |   [\xF0-\xF7][\x80-\xBF]{3} # quadruple-byte sequence 11110xxx 10xxxxxx * 3 
                            ){1,100}                      # ...one or more times
                          )
                        | ( [\x80-\xBF] )                 # invalid byte in range 10000000 - 10111111
                        | ( [\xC0-\xFF] )                 # invalid byte in range 11000000 - 11111111
                        /x
                        HEREDOC;
                        // END  must not have white-space or there will

                        $pattern1 = "Â";
                        $pattern2 = "â";
                        $pattern3 = "Ã©";
                        $pattern4 = "ZenÅ";
                        $pattern5 = "€“";
                        $pattern6 = "Ã¢â‚¬Ã´";
                        $pattern7 = "â";
                        $pattern8 = "";
                        $formatted_string1 = str_replace($pattern1, '', $input);
						$formatted_string2 = str_replace( $pattern2, '-', $formatted_string1);
						$formatted_string3 = str_replace( $pattern3, 'é', $formatted_string2);
						$formatted_string4 = str_replace( $pattern4, 'Zenō', $formatted_string3);
                        $formatted_string5 = str_replace( $pattern5, '—', $formatted_string4);
                        $formatted_string6 = str_replace( $pattern6, "'", $formatted_string5);
                        $formatted_string7 = str_replace( $pattern7, "", $formatted_string6);
                        $formatted_string8 = str_replace( $pattern8, "", $formatted_string7);

                        $formatted_string9 = preg_replace_callback(
                            $regex,
                            function ($m) { return utfStringReplacer($m); }, // Now a Closure
                            $formatted_string8
                        );

                        $final = mb_convert_encoding($formatted_string9, 'UTF-8','Windows-1252');
                        return  $final;
                    }


                    function check_int($value){
                            if(is_int($value)){
                                return $value;
                            }else{
                                return (int)$value;
                            }
                    }
                    function format_date_for_sql($date){
                            $newDate = strftime('%Y-%m-%d', strtotime($date));
                            return $newDate;
                    }
                    
                    function import_episodes_csv($filePath){
                        // Delete table values
                        DB::table('episodes')->truncate();
                        $csv = Reader::createFromPath($filePath, 'r');
                        $stmt = (new Statement())
                            ->offset(1);
                        $row_count = 1;
                        $records = $stmt->process($csv);
                        $record_count  = count($records);

                        foreach ($records as $record) {


                            $row = [
                                "episode_number" => check_int($record[0]),
                                "episode_title"  =>  escape_string_for_sql($record[1]),
                                "episode_duration"  => $record[2],
                                "episode_synopsis"  => escape_string_for_sql($record[3]),
                                "original_airdate"  => format_date_for_sql($record[4]),
                                "american_airdate"  => format_date_for_sql($record[5]),
                                "url"  => $record[6],
                                "season_id" => check_int($record[7]),
                                "series_id"  =>   check_int($record[8]),
                            ];
                            echo " Inserting row  : {$row_count} \r\n";
                            $recordSaved = Episode::firstOrCreate($row);
                            if($row_count == $record_count){
                                echo "All $record_count} rows inserted successfully";
                                $db =  env('DB_DATABASE');
								//$updateSuccessfull = DB::statement("UPDATE episodes SET american_airdate = null  where american_airdate  = '1970-01-01'");
                                $updateSuccessfull = DB::table('episodes')->where('american_airdate', '1970-01-01')->update(['american_airdate' => null]);

								if($updateSuccessfull){
									echo "\r\n Records successfully updated";
								}
                            }
                            $row_count++;
                            if(!$recordSaved):
                                echo  "Insert failed at row: {$row_count} \r\n";
                                echo  "Please examine your data below:  \r\n\r\n\r\n";
                                echo  "Episode Number : {$record[0]}\r\n";
                                echo  "Episode Title : {$record[1]}\r\n";
                                echo  "Episode Duration: {$record[2]}\r\n";
                                echo  "Episode Synopsis: {$record[3]}\r\n";
                                echo  "Original Airdate: {$record[4]}\r\n";
                                echo  "American Airdate: {$record[5]}\r\n";
                                echo  "URL: {$record[6]}\r\n";
                                echo  "Season ID: {$record[7]}\r\n";
                                echo  "Series ID: {$record[8]}\r\n";
                                break;
                            endif;
                        }


                    }
                    $filePath = base_path(). '/database/seeds/episodes-import.csv';
                    //Start import
                    $file  = mb_convert_encoding($filePath, 'UTF-8');
                    import_episodes_csv($file);



    }
  
}   
