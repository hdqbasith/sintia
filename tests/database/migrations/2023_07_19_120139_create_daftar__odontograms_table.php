<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarOdontogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar__odontograms', function (Blueprint $table) {
            $table->id();
            $table->string('link_gambar')->nullable();
            $table->char('kode', 255)->nullable();
            $table->string('arti')->nullable();
            $table->string('catatan')->nullable();
            $table->uuid('created_by')->nullable();
            $table->timestamps();
            
            $table->foreign('created_by', 'daftar__odontograms_created_by_foreign')->references('id')->on('auth__users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar__odontograms');
    }
}
