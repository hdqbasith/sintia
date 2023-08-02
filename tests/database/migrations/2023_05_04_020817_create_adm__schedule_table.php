<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__schedule', function (Blueprint $table) {
            $table->integer('sch_id');
            $table->string('sch_tahun_ajaran', 10)->nullable();
            $table->integer('sch_semester')->nullable();
            $table->integer('sch_class')->nullable();
            $table->integer('sch_day')->nullable();
            $table->integer('sch_hour')->nullable();
            $table->integer('sch_duration')->default(1);
            $table->string('sch_teacher', 32)->nullable();
            $table->integer('sch_subject')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm__schedule');
    }
}
