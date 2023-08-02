<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__subject', function (Blueprint $table) {
            $table->integer('sub_id');
            $table->string('sub_mapel', 50)->nullable();
            $table->string('sub_kelas', 3)->nullable();
            $table->string('sub_kitab', 50)->nullable();
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
        Schema::dropIfExists('adm__subject');
    }
}
