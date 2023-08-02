<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioGuardianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__guardian', function (Blueprint $table) {
            $table->string('wali_akun', 32);
            $table->string('ortu_kepala_keluarga', 50)->nullable();
            $table->string('ortu_kk', 20)->nullable();
            $table->integer('wali_hubungan')->nullable();
            $table->string('wali_nama', 50)->nullable();
            $table->string('wali_nik', 20)->nullable();
            $table->string('wali_tmplahir', 30)->nullable();
            $table->date('wali_tgllahir')->nullable();
            $table->string('wali_hp', 20)->nullable();
            $table->integer('wali_pendidikan')->nullable();
            $table->integer('wali_pekerjaan')->nullable();
            $table->integer('wali_penghasilan')->nullable();
            $table->integer('wali_tpt_tinggal')->nullable();
            $table->integer('wali_propinsi')->nullable();
            $table->integer('wali_kabupaten')->nullable();
            $table->integer('wali_kecamatan')->nullable();
            $table->bigInteger('wali_kelurahan')->nullable();
            $table->integer('wali_rt')->nullable();
            $table->integer('wali_rw')->nullable();
            $table->integer('wali_kode_pos')->nullable();
            $table->string('wali_alamat', 250)->nullable();
            $table->integer('wali_status_rumah')->nullable();
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
        Schema::dropIfExists('bio__guardian');
    }
}
