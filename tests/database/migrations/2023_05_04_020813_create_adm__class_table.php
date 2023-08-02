<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__class', function (Blueprint $table) {
            $table->integer('kelas_id');
            $table->string('kelas_nama_kelas', 10)->nullable();
            $table->string('kelas_nama_kelas2', 10)->nullable();
            $table->string('kelas_tahun_ajaran', 10)->nullable();
            $table->string('kelas_kode_wali', 32)->nullable();
            $table->string('kelas_nama_wali', 50)->nullable();
            $table->integer('kelas_jurusan')->nullable();
            $table->string('kelas_tingkat', 3)->nullable();
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
        Schema::dropIfExists('adm__class');
    }
}
