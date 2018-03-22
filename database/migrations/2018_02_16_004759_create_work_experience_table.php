<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position',30)->nullable();
            $table->string('employer',30)->nullable();
            $table->bigInteger('startSalary')->unsigned()->nullable();
            $table->string('otherBenefits')->nullable();
            $table->string('tasks')->nullable();
            $table->string('beginDate')->nullable();
            $table->string('endDate')->nullable();
            $table->string('country')->nullable();
            $table->string('reasonOfResignation')->nullable();
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
        Schema::dropIfExists('work_experience');
    }
}
