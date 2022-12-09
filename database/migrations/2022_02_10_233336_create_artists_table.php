<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('artistname');
            $table->string('realname');
            $table->string('number');
            $table->string('genre');
            $table->string('mail');
            $table->string('dateregistered');
            $table->string('background_img');
            $table->string('secondbackground_img');
            $table->string('nationality');
            $table->string('address');
            $table->string('image');  
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
        Schema::dropIfExists('artists');
    }
}
