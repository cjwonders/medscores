<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimestampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timestamps', function (Blueprint $table) {
            $table->id();
            $table->Integer('test_id');
            $table->Integer('response1');
            $table->Integer('response2');
            $table->Integer('response3');
            $table->Integer('response4');
            $table->Integer('response5');
            $table->Integer('response6');
            $table->Integer('response7');
            $table->Integer('response8');
            $table->Integer('response9');
            $table->Integer('response10');
            $table->Integer('response11');
            $table->Integer('response12');
            $table->Integer('response13');
            $table->Integer('response14');
            $table->Integer('response15');
            $table->Integer('response16');
            $table->Integer('response17');
            $table->Integer('response18');
            $table->Integer('response19');
            $table->Integer('response20');
            $table->Integer('response21');
            $table->Integer('response22');
            $table->Integer('response23');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timestamps');
    }
}
