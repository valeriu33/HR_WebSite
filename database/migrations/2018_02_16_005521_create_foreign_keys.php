<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applies', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
        });

        Schema::table('personal_info', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('studies', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('work_experience', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->foreign('applies_id')->references('id')->on('applies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
