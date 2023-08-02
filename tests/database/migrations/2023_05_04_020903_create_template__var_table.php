<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateVarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template__var', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('kode', 50)->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('ket', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template__var');
    }
}
