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
        Schema::create('pasien_odontograms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien')->nullable();
            $table->integer('number')->nullable();
            $table->string('left')->nullable();
            $table->string('top')->nullable();
            $table->string('right')->nullable();
            $table->string('bottom')->nullable();
            $table->string('middle')->nullable();
            $table->unsignedBigInteger('condition')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('pasien')
                ->nullable()
                ->references('id')
                ->on('daftar_pasiens')
                ->onDelete('cascade');
            $table->foreign('condition')
                ->nullable()
                ->references('id')
                ->on('daftar_odontograms')
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
        Schema::dropIfExists('pasien_odontograms');
    }
};
