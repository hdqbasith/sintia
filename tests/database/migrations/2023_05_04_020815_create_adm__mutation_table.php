<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmMutationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__mutation', function (Blueprint $table) {
            $table->integer('mutasi_id');
            $table->string('mutasi_akun', 32)->nullable();
            $table->integer('mutasi_noreg')->nullable();
            $table->integer('mutasi_pil_jurusan')->nullable();
            $table->integer('mutasi_status')->nullable();
            $table->date('mutasi_tgl_keluar')->nullable();
            $table->date('mutasi_tgl_masuk')->nullable();
            $table->string('mutasi_nis_lokal', 20)->nullable();
            $table->string('mutasi_nism', 20)->nullable();
            $table->integer('mutasi_absen')->nullable();
            $table->integer('mutasi_kelas_id')->nullable();
            $table->string('mutasi_tahun_ajaran', 10)->nullable();
            $table->string('mutasi_ujian', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm__mutation');
    }
}
