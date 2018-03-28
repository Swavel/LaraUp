<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettisizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settisizer_tuples', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->timestamps();
        });

        Schema::create('settisizer_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('settisizer_values', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('settisizer_setting_id');
            $table->unsignedInteger('settisizer_tuple_id');

            $table->text('data');

            $table->timestamps();

            $table->foreign('settisizer_setting_id')->references('id')->on('settisizer_settings')->onDelete('Cascade');
            $table->foreign('settisizer_tuple_id')->references('id')->on('settisizer_tuples')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settisizer_values');
        Schema::dropIfExists('settisizer_settings');
        Schema::dropIfExists('settisizer_tuples');
    }
}
