<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantPpdbFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant__ppdb_file', function (Blueprint $table) {
            $table->integer('file_id');
            $table->string('akun', 32);
            $table->string('kk', 250)->nullable();
            $table->string('akta', 250)->nullable();
            $table->string('ijazah', 250)->nullable();
            $table->string('ijazahsd', 250)->nullable();
            $table->string('skl', 250)->nullable();
            $table->string('foto', 250)->nullable();
            $table->integer('ckk')->nullable();
            $table->integer('cakta')->nullable();
            $table->integer('cijazah')->nullable();
            $table->tinyInteger('cijazahsd')->nullable();
            $table->integer('cskl')->nullable();
            $table->integer('cfoto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant__ppdb_file');
    }
}
