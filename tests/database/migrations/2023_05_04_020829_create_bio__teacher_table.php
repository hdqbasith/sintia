<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio__teacher', function (Blueprint $table) {
            $table->string('t_akun', 32);
            $table->string('t_nama', 50)->nullable();
            $table->integer('t_nip')->nullable();
            $table->integer('t_nuptk')->nullable();
            $table->string('t_ttd', 250)->nullable();
            $table->string('t_tempat_lahir', 50)->nullable();
            $table->date('t_tanggal_lahir')->nullable();
            $table->date('t_mulai_tugas')->nullable();
            $table->string('t_alamat', 250)->nullable();
            $table->string('t_pendidikan', 20)->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bio__teacher');
    }
}
