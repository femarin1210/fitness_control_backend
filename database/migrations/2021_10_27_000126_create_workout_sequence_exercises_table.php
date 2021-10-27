<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkoutSequenceExercises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_sequence_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sequence');
            $table->integer('qtySeries');
            $table->integer('sequence');
            $table->integer('qtyRepetitions');
            $table->integer('qtyWeight');
            $table->bigInteger('idWorkoutSequence');
            $table->string('qtyInterval');
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
        Schema::dropIfExists('workout_sequence_exercises');
    }
}
