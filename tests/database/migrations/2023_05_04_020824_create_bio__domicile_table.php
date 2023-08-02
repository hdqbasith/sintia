<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioDomicileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__domicile', function (Blueprint $table) {
            $table->string('m_akun', 32);
            $table->integer('m_tmp_tinggal')->nullable();
            $table->integer('m_pondok_kode')->nullable();
            $table->string('m_pondok_nama', 250)->nullable();
            $table->string('m_pemilik', 50)->nullable();
            $table->string('m_hp_pemilik', 20)->nullable();
            $table->integer('m_propinsi')->nullable();
            $table->integer('m_kabupaten')->nullable();
            $table->integer('m_kecamatan')->nullable();
            $table->bigInteger('m_kelurahan')->nullable();
            $table->integer('m_rt')->nullable();
            $table->integer('m_rw')->nullable();
            $table->integer('m_kode_pos')->nullable();
            $table->string('m_alamat', 250)->nullable();
            $table->integer('m_jarak')->nullable();
            $table->integer('m_transport')->nullable();
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
        Schema::dropIfExists('bio__domicile');
    }
}
