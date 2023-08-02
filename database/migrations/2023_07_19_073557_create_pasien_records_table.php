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
        Schema::create('pasien_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien');
            $table->string('tabel')->default('anamnesa');
            $table->bigInteger('kode')->nullable();
            $table->bigInteger('keterangan')->nullable();
            $table->integer('klinik')->default(1);
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
        Schema::dropIfExists('pasien_records');
    }
};
