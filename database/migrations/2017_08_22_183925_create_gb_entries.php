<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGbEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gb_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();

            $table->string('title')->default('');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id', 'gb_entries_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('parent_id', 'gb_entries_self')->references('id')->on('gb_entries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gb_entries', function (Blueprint $table) {
            $table->dropForeign('gb_entries_user_id');
            $table->dropForeign('gb_entries_self');
        });

        Schema::dropIfExists('gb_entries');
    }
}
