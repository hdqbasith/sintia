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
        Schema::create('daftar_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rm');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nik')->nullable();
            $table->string('bpjs')->nullable();
            $table->enum('gender',['L','P'])->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hp')->nullable();
            $table->enum('goldar',['A','B','AB','O'])->nullable();
            $table->uuid('akun')->nullable();
            $table->integer('klinik')->default(1);
            $table->uuid('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')
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
        Schema::dropIfExists('daftar_pasiens');
    }
};
