<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('episode_number');
            $table->string('episode_title');
            $table->float('episode_duration');
            $table->text('episode_synopsis');
            $table->date('original_airdate');
            $table->date('american_airdate')->nullable()->default(null);
            $table->string('url', 2083)->nullable();
            $table->bigInteger('season_id');
            $table->bigInteger('series_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
