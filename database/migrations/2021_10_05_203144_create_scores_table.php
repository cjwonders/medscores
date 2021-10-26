<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->Integer('question1');
            $table->Integer('question2');
            $table->Integer('question3');
            $table->Integer('question4');
            $table->Integer('question5');
            $table->Integer('question6');
            $table->Integer('question7');
            $table->Integer('question8');
            $table->Integer('question9');
            $table->Integer('question10');
            $table->Integer('question11');
            $table->Integer('question12');
            $table->Integer('question13');
            $table->Integer('question14');
            $table->Integer('question15');
            $table->Integer('question16');
            $table->Integer('question17');
            $table->Integer('question18');
            $table->Integer('question19');
            $table->Integer('question20');
            $table->Integer('question21');
            $table->Integer('question22');
            $table->Integer('question23');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
