<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__attendance', function (Blueprint $table) {
            $table->integer('att_id')->primary();
            $table->string('att_akun', 32)->nullable();
            $table->dateTime('att_date')->nullable();
            $table->char('att_excuse', 1)->nullable();
            $table->string('att_detail', 250)->nullable();
            $table->tinyInteger('att_public')->nullable();
            $table->string('att_teacher', 32)->nullable();
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
        Schema::dropIfExists('student__attendance');
    }
}
