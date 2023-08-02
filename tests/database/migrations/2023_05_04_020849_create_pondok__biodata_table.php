<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondokBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pondok__biodata', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama', 100)->nullable();
            $table->string('pengasuh', 100)->nullable();
            $table->string('alamat', 250)->nullable();
            $table->string('hp', 15)->nullable();
            $table->string('kodepondok', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pondok__biodata');
    }
}
