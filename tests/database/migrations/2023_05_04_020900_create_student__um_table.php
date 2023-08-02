<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__um', function (Blueprint $table) {
            $table->integer('um_id')->primary();
            $table->integer('um_absen')->nullable();
            $table->string('um_akun', 32)->nullable()->index('um_akun');
            $table->string('um_nama', 100)->nullable();
            $table->integer('um_sesi')->nullable();
            $table->integer('um_ruang')->nullable();
            $table->string('um_kelas', 5)->nullable();
            $table->string('um_token', 32)->nullable();
            $table->string('um_mapel', 50)->nullable();
            $table->string('um_progres', 50)->nullable();
            $table->float('um_nilai', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__um');
    }
}
