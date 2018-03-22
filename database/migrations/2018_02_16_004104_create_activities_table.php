<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameOfOrganizer',30)->nullable();
            $table->string('location',30)->nullable();
            $table->string('trainingSubject',100)->nullable();
            $table->string('beginDate')->nullable();
            $table->string('endDate')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('applies_id')->unsigned()->nullable();
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
        Schema::dropIfExists('activities');
    }
}
