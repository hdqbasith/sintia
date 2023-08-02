<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMDaftarSmpMtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m__daftar_smp_mts', function (Blueprint $table) {
            $table->string('npsn', 15);
            $table->string('provinsi', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('nama', 250)->nullable();
            $table->string('status', 6)->nullable();
            $table->string('nsm', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__daftar_smp_mts');
    }
}
