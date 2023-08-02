<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantBasicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant__basic_data', function (Blueprint $table) {
            $table->integer('id');
            $table->string('akun', 32)->nullable();
            $table->integer('reg')->nullable();
            $table->string('nisn', 15)->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('namasiswa', 50)->nullable();
            $table->string('ttlsiswa', 30)->nullable();
            $table->date('tglsiswa')->nullable();
            $table->string('emailsiswa', 50)->nullable();
            $table->string('hpsiswa', 15)->nullable();
            $table->string('jrssiswa', 4)->nullable();
            $table->string('almlengkap', 250)->nullable();
            $table->boolean('daritbs')->default(0);
            $table->string('aslsb', 50)->nullable();
            $table->timestamp('last_mod')->nullable()->default('current_timestamp()');
            $table->string('ket')->nullable();
            $table->string('kelasmts', 4)->nullable();
            $table->tinyInteger('absenmts')->nullable();
            $table->string('password', 32)->nullable();
            $table->integer('bayar')->default(0);
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
        Schema::dropIfExists('applicant__basic_data');
    }
}
