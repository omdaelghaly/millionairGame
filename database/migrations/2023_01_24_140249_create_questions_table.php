<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('grade_id');
            $table->integer('subject_id');
            $table->integer('term_id');
            $table->integer('exam_id')->nullable();
            $table->text('q');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->text('x');
            $table->text('i');
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
        Schema::dropIfExists('questions');
    }
}
