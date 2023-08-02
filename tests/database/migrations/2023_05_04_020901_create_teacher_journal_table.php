<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_journal', function (Blueprint $table) {
            $table->integer('jnl_id')->primary();
            $table->string('jnl_akun', 32)->nullable();
            $table->integer('jnl_mapel')->nullable();
            $table->text('jnl_content')->nullable();
            $table->integer('jnl_class')->nullable();
            $table->dateTime('jnl_date')->nullable();
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
        Schema::dropIfExists('teacher_journal');
    }
}
