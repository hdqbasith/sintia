<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien__transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien')->nullable();
            $table->string('tabel')->nullable();
            $table->bigInteger('kode')->nullable();
            $table->bigInteger('tarif')->nullable();
            $table->tinyInteger('kuantitas')->nullable();
            $table->unsignedInteger('harga')->nullable();
            $table->uuid('admin')->nullable();
            $table->timestamps();
            
            $table->foreign('admin', 'pasien__transaksis_admin_foreign')->references('id')->on('auth__users')->onDelete('cascade');
            $table->foreign('pasien', 'pasien__transaksis_pasien_foreign')->references('id')->on('daftar__pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien__transaksis');
    }
}
