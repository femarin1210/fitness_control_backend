<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('type',1);
            $table->string('title');
            $table->string('date');
            $table->double('height');
            $table->double('weight');
            $table->double('fatPercentage');
            $table->integer('chest');
            $table->integer('biceps');
            $table->integer('waist');
            $table->integer('hip');
            $table->integer('thigh');
            $table->integer('calf');
            $table->string('active',1);
            $table->bigInteger('idUser');
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
        Schema::dropIfExists('assessments');
    }
}
