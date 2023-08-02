<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notification', function (Blueprint $table) {
            $table->bigInteger('notif_id')->primary();
            $table->string('notif_title', 250)->nullable()->index('notif_title');
            $table->text('notif_content')->nullable();
            $table->string('notif_for', 32)->nullable()->index('notif_for');
            $table->boolean('notif_status')->default(0);
            $table->dateTime('notif_date')->default('current_timestamp()');
            $table->string('notif_icon', 250)->nullable();
            $table->string('notif_group', 250)->default('notif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notification');
    }
}
