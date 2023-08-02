<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_token', function (Blueprint $table) {
            $table->integer('tkn_id')->primary();
            $table->string('tkn_akun', 32)->nullable();
            $table->dateTime('tkn_start')->default('current_timestamp()');
            $table->dateTime('tkn_end')->nullable();
            $table->string('tkn_uuid', 32)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_token');
    }
}
