<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__materi', function (Blueprint $table) {
            $table->integer('m_id')->primary();
            $table->string('m_guru', 50)->nullable();
            $table->string('m_pelajaran', 50)->nullable();
            $table->string('m_kelas', 8)->nullable();
            $table->string('m_tema', 250)->nullable();
            $table->string('m_link', 250)->nullable();
            $table->text('m_isi')->nullable();
            $table->string('m_jenis', 50)->nullable();
            $table->dateTime('m_date_start')->nullable();
            $table->dateTime('m_date_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__materi');
    }
}
