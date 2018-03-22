<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname',40);
            $table->string('middlename',40)->nullable();
            $table->string('lastname',40);
            $table->string('filename')->nullable();
            $table->string('cellPhoneNumber',40)->nullable();
            $table->string('phoneNumber',40)->nullable();
            $table->string('address',100)->nullable();
            $table->string('nationality',30)->nullable();
            $table->string('countryOfBirth',30)->nullable();
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
        Schema::dropIfExists('personal_info');
    }
}
