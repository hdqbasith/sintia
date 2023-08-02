<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMapelTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__mapel_tes', function (Blueprint $table) {
            $table->integer('mt_id')->primary();
            $table->string('mt_kode', 50)->unique('kode');
            $table->string('mt_guru', 32)->nullable();
            $table->string('mt_pelajaran', 50)->nullable();
            $table->string('mt_kelas', 15)->nullable();
            $table->string('mt_token', 10)->nullable();
            $table->integer('mt_durasi')->nullable();
            $table->date('mt_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__mapel_tes');
    }
}
