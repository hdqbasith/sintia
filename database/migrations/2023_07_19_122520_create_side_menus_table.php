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
        Schema::create('side_menus', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('parent')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->enum('level',['admin','dokter','kasir','perawat','pasien'])->nullable();
            $table->boolean('active')->nullable();
            $table->string('icon')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('side_menus');
    }
};
