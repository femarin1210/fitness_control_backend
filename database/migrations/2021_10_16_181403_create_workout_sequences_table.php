<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutSequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_sequences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('workout');
            $table->integer('sequence');
            $table->char('status', 1);
            $table->bigInteger('idWorkout');
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
        Schema::dropIfExists('workout_sequences');
    }
}
