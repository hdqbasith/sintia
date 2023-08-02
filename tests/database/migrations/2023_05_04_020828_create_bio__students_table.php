<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__students', function (Blueprint $table) {
            $table->string('s_akun', 32);
            $table->string('s_nisn', 20)->nullable();
            $table->string('s_nama_lengkap', 50)->nullable();
            $table->string('s_nama_arab', 50)->nullable();
            $table->string('s_tempat_lahir', 50)->nullable();
            $table->date('s_tanggal_lahir')->nullable();
            $table->string('s_nik', 30)->nullable();
            $table->string('s_kk', 20)->nullable();
            $table->string('s_kepala_keluarga', 50)->nullable();
            $table->integer('s_anak_ke')->nullable();
            $table->integer('s_jml_saudara')->nullable();
            $table->string('s_email', 50)->nullable();
            $table->string('s_hp', 20)->nullable();
            $table->integer('s_hobi')->nullable();
            $table->integer('s_citacita')->nullable();
            $table->string('as_nama', 100)->nullable();
            $table->integer('as_npsn')->nullable();
            $table->integer('as_propinsi')->nullable();
            $table->integer('as_kabupaten')->nullable();
            $table->string('as_tahun_ajaran', 10)->nullable();
            $table->string('as_kelas_mts', 10)->nullable();
            $table->string('as_alamat', 200)->nullable();
            $table->dateTime('created')->default('current_timestamp()');
            $table->string('createdby', 50)->nullable();
            $table->dateTime('updated')->default('current_timestamp()');
            $table->string('updatedby', 50)->nullable();
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
        Schema::dropIfExists('bio__students');
    }
}
