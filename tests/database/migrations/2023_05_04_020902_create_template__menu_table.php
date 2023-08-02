<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template__menu', function (Blueprint $table) {
            $table->integer('menu_id')->primary();
            $table->integer('menu_parent')->nullable();
            $table->integer('menu_order')->nullable();
            $table->string('menu_name', 250)->nullable();
            $table->string('menu_link', 250)->nullable();
            $table->tinyInteger('user_level')->nullable();
            $table->tinyInteger('menu_active')->nullable();
            $table->string('menu_icon', 250)->nullable();
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
        Schema::dropIfExists('template__menu');
    }
}
