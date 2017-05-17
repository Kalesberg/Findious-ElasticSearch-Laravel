<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('geometry')->nullable();
            $table->string('i_phone')->nullable();
            $table->string('name')->nullable();
            $table->text('openhour')->nullable();
            $table->string('rating')->nullable();
            $table->string('place_id')->nullable();
            $table->text('review')->nullable();
            $table->string('scope')->nullable();
            $table->string('types')->nullable();
            $table->string('url')->nullable();
            $table->string('utc_offset')->nullable();
            $table->string('vicinity')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('maps');
    }
}
