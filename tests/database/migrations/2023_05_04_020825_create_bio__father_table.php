<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioFatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__father', function (Blueprint $table) {
            $table->string('ak_akun', 32);
            $table->string('ak_nama', 50)->nullable();
            $table->string('ak_nama_gelar', 100)->nullable();
            $table->string('ak_nama_arab', 50)->nullable();
            $table->string('ak_nik', 20)->nullable();
            $table->string('ak_tmplahir', 30)->nullable();
            $table->date('ak_tgllahir')->nullable();
            $table->integer('ak_status')->nullable();
            $table->string('ak_hp', 20)->nullable();
            $table->integer('ak_pendidikan')->nullable();
            $table->integer('ak_pekerjaan')->nullable();
            $table->integer('ak_penghasilan')->nullable();
            $table->integer('ak_propinsi')->nullable();
            $table->integer('ak_kabupaten')->nullable();
            $table->integer('ak_kecamatan')->nullable();
            $table->bigInteger('ak_kelurahan')->nullable();
            $table->integer('ak_rt')->nullable();
            $table->integer('ak_rw')->nullable();
            $table->integer('ak_kode_pos')->nullable();
            $table->string('ak_alamat', 250)->nullable();
            $table->string('ak_alamat_arab', 250)->nullable();
            $table->integer('ak_status_rumah')->nullable();
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
        Schema::dropIfExists('bio__father');
    }
}
