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
        Schema::create('daftar_keluhans', function (Blueprint $table) {
            $table->id();
            $table->char('kode');
            $table->string('anamnesa');
            $table->uuid('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')
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
        Schema::dropIfExists('keluhans');
    }
};
