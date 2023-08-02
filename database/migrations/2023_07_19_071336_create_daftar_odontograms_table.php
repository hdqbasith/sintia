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
        Schema::create('daftar_odontograms', function (Blueprint $table) {
            $table->id();
            $table->string('link_gambar')->nullable();
            $table->char('kode')->nullable();
            $table->string('arti')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('daftar_odontograms');
    }
};
