<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioMotherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__mother', function (Blueprint $table) {
            $table->string('ik_akun', 32);
            $table->string('ik_nama', 50)->nullable();
            $table->string('ik_nik', 20)->nullable();
            $table->string('ik_tmplahir', 30)->nullable();
            $table->date('ik_tgllahir')->nullable();
            $table->integer('ik_status')->nullable();
            $table->string('ik_hp', 20)->nullable();
            $table->integer('ik_pendidikan')->nullable();
            $table->integer('ik_pekerjaan')->nullable();
            $table->integer('ik_penghasilan')->nullable();
            $table->integer('ik_tpt_tinggal')->nullable();
            $table->integer('ik_propinsi')->nullable();
            $table->integer('ik_kabupaten')->nullable();
            $table->integer('ik_kecamatan')->nullable();
            $table->bigInteger('ik_kelurahan')->nullable();
            $table->integer('ik_rt')->nullable();
            $table->integer('ik_rw')->nullable();
            $table->integer('ik_kode_pos')->nullable();
            $table->string('ik_alamat', 250)->nullable();
            $table->integer('ik_status_rumah')->nullable();
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
        Schema::dropIfExists('bio__mother');
    }
}
