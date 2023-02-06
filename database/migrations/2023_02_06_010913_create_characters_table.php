<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('character_name');
            $table->string('short_name');
            $table->string('race');
            $table->string('gender');
            $table->string('height');
            $table->string('rivals');
            $table->string('allies');
            $table->string('year_of_birth');
            $table->string('residence');
            $table->string('creator');
            $table->string('forms');
            $table->text('bio');
            $table->string('profile_image');
            $table->string('hero_image');
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
        Schema::dropIfExists('characters');
    }
}
