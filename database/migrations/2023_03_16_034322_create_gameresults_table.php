<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameresults', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('grade_id');
            $table->integer('subject_id');
            $table->integer('term_id');
            $table->text('name');
            $table->integer('mark')->default(0);
            $table->integer('level')->nullable();
            $table->integer('unit')->nullable();
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
        Schema::dropIfExists('gameresults');
    }
}
