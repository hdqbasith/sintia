<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__score', function (Blueprint $table) {
            $table->integer('scr_id')->primary();
            $table->string('scr_akun', 32)->nullable();
            $table->integer('scr_mapel')->nullable();
            $table->string('scr_teacher', 32)->nullable();
            $table->double('scr_score', 5, 2)->nullable();
            $table->dateTime('scr_date')->nullable();
            $table->string('scr_category', 50)->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__score');
    }
}
