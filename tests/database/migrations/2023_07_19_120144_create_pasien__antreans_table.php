<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienAntreansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien__antreans', function (Blueprint $table) {
            $table->id();
            $table->char('nomor', 255)->nullable();
            $table->unsignedBigInteger('pasien')->nullable();
            $table->enum('kehadiran', ['d', 'p', 't', 's'])->default('D');
            $table->dateTime('booking_mulai')->nullable();
            $table->dateTime('booking_selesai')->nullable();
            $table->integer('klinik')->default(1);
            $table->boolean('online')->default(0);
            $table->uuid('admin')->nullable();
            $table->timestamps();
            
            $table->foreign('admin', 'pasien__antreans_admin_foreign')->references('id')->on('auth__users')->onDelete('cascade');
            $table->foreign('pasien', 'pasien__antreans_pasien_foreign')->references('id')->on('daftar__pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien__antreans');
    }
}
