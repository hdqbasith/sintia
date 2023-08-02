<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien')->nullable();
            $table->string('tabel')->nullable();
            $table->bigInteger('kode')->nullable();
            $table->bigInteger('tarif')->nullable();
            $table->tinyInteger('kuantitas')->nullable();
            $table->unsignedInteger('harga')->nullable();
            $table->uuid('admin')->nullable();
            $table->timestamps();

            $table->foreign('pasien')
                ->nullable()
                ->references('id')
                ->on('daftar_pasiens')
                ->onDelete('cascade');
            $table->foreign('admin')
                ->nullable()
                ->references('id')
                ->on('auth_users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien_transaksis');
    }
};
