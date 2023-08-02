<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm__post', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->string('post_author', 32)->nullable();
            $table->dateTime('post_date')->default('current_timestamp()');
            $table->dateTime('post_end')->nullable();
            $table->longText('post_content')->nullable();
            $table->text('post_title')->nullable();
            $table->string('post_status', 20)->default('publish');
            $table->string('post_name', 200)->nullable();
            $table->dateTime('post_modified')->default('current_timestamp()');
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
        Schema::dropIfExists('adm__post');
    }
}
