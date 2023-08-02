<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondokSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pondok__santri', function (Blueprint $table) {
            $table->integer('p_id')->primary();
            $table->string('p_akun', 32);
            $table->integer('p_kode')->nullable();
            $table->integer('p_verified')->nullable();
            $table->string('p_tahun_ajaran', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pondok__santri');
    }
}
