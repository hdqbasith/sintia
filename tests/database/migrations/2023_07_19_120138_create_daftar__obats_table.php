<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar__obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('satuan')->nullable();
            $table->unsignedInteger('stok')->nullable();
            $table->unsignedInteger('hargabeli')->nullable();
            $table->unsignedInteger('hargajual')->nullable();
            $table->date('expired')->nullable();
            $table->uuid('created_by')->nullable();
            $table->timestamps();
            
            $table->foreign('created_by', 'daftar__obats_created_by_foreign')->references('id')->on('auth__users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar__obats');
    }
}
