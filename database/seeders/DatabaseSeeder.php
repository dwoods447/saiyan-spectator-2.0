<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "Starting seeding of database tables.........\r\n";
        echo "\r\nCurrently working on the : 'Series' database table .........\r\n";
        $this->call(SeriesSeeder::class);
        echo "\r\nFinished seeding 'Series' database table\r\n\r\n\r\n";
        echo "Currently working on the : 'Seasons' database table.........\r\n";
        $this->call(SeasonsSeeder::class);
        echo "\r\nFinished seeding 'Seasons' database table\r\n\r\n\r\n";
        echo "Currently working on the : 'Episodes' database table.........\r\n";
        $this->call(EpisodeSeeder::class);
        echo "\r\nFinished seeding 'Episodes' database table\r\n\r\n";
        echo "\r\nCurrently working on the : 'Characters' database table\r\n\r\n";
        $this->call(CharacterSeeder::class);
        echo "\r\nFinished seeding 'Characters' database table\r\n\r\n";
    }
}
