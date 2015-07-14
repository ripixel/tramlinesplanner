<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('artist_name');
            $table->string('venue_name');
            $table->string('start_time');
            $table->string('end_time');

            $table->foreign('artist_name')
                    ->references('name')
                    ->on('artists');
            $table->foreign('venue_name')
                    ->references('name')
                    ->on('venues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timings');
    }
}
