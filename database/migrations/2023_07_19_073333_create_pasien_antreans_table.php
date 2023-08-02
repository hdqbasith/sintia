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
        Schema::create('pasien_antreans', function (Blueprint $table) {
            $table->id();
            $table->char('nomor')->nullable();
            $table->unsignedBigInteger('pasien')->nullable();
            $table->enum('kehadiran',['D','P','T','S'])->default('D');
            //daftar, panggil, tunda, selesai
            $table->dateTime('booking_mulai')->useCurrent();
            $table->dateTime('booking_selesai')->useCurrent()->useCurrentOnUpdate();
            $table->integer('klinik')->default(1);
            $table->boolean('online')->default(false);
            $table->uuid('admin')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

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
        Schema::dropIfExists('pasien_antreans');
    }
};
