<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSusulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__susulan', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nisn', 50)->nullable();
            $table->string('mapel', 50)->nullable();
            $table->integer('approve')->default(9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__susulan');
    }
}
