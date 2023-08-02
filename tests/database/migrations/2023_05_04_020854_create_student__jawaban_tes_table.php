<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentJawabanTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__jawaban_tes', function (Blueprint $table) {
            $table->integer('jt_id')->primary();
            $table->string('jt_akun', 32)->nullable();
            $table->dateTime('jt_waktu_mulai')->nullable();
            $table->dateTime('jt_waktu_selesai')->nullable();
            $table->string('jt_jawaban', 100)->nullable();
            $table->decimal('jt_nilai', 5, 2)->nullable();
            $table->string('jt_pelanggaran', 350)->nullable();
            $table->string('jt_mapel', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__jawaban_tes');
    }
}
