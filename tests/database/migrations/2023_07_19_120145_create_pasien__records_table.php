<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien__records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien');
            $table->string('tabel')->default('anamnesa');
            $table->bigInteger('kode')->nullable();
            $table->bigInteger('keterangan')->nullable();
            $table->integer('klinik')->default(1);
            $table->uuid('admin')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            
            $table->foreign('admin', 'pasien__records_admin_foreign')->references('id')->on('auth__users')->onDelete('cascade');
            $table->foreign('pasien', 'pasien__records_pasien_foreign')->references('id')->on('daftar__pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien__records');
    }
}
