<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__config', function (Blueprint $table) {
            $table->integer('cnf_id');
            $table->string('cnf_nama_madrasah', 250)->nullable();
            $table->string('cnf_kamad', 50)->nullable();
            $table->string('cnf_tahun_ajaran', 10)->nullable();
            $table->integer('cnf_semester')->nullable();
            $table->string('cnf_alamat', 250)->nullable();
            $table->string('cnf_telp', 20)->nullable();
            $table->string('cnf_hp', 20)->nullable();
            $table->string('cnf_kurikulum', 50)->nullable();
            $table->string('cnf_logo', 250)->nullable();
            $table->string('cnf_kop', 250)->nullable();
            $table->integer('cnf_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm__config');
    }
}
