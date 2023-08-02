<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSoalTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__soal_tes', function (Blueprint $table) {
            $table->integer('st_id')->primary();
            $table->integer('st_nomor')->nullable();
            $table->string('st_mapel', 100)->nullable();
            $table->text('st_soal')->nullable();
            $table->string('st_a', 500)->nullable();
            $table->string('st_b', 500)->nullable();
            $table->string('st_c', 500)->nullable();
            $table->string('st_d', 500)->nullable();
            $table->string('st_e', 500)->nullable();
            $table->string('st_gambar', 250)->nullable();
            $table->string('st_jawaban', 3)->nullable();
            $table->enum('st_dir', ['rtl', 'ltr'])->default('ltr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__soal_tes');
    }
}
