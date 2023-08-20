<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien');
            $table->string('subjective')->nullable();
            $table->string('objective')->nullable();
            $table->unsignedBigInteger('assessment')->nullable();
            $table->unsignedBigInteger('planning')->nullable();
            $table->string('detail')->nullable();
            $table->string('prescription')->nullable();
            $table->unsignedBigInteger('cost')->nullable();
            $table->integer('klinik')->default(1);
            $table->uuid('admin')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('assessment')
                ->nullable()
                ->references('id')
                ->on('daftar_diagnoses')
                ->onDelete('cascade');
            $table->foreign('planning')
                ->nullable()
                ->references('id')
                ->on('daftar_terapis')
                ->onDelete('cascade');
            $table->foreign('pasien')
                ->nullable()
                ->references('id')
                ->on('daftar_pasiens')
                ->onDelete('cascade');
            $table->foreign('admin')
                ->nullable()
                ->references('id')
                ->on('auth_users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien_records');
    }
};
