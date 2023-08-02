<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__alumni', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama_lengkap', 300)->nullable();
            $table->string('nis_lokal', 150)->nullable();
            $table->string('nisn', 100)->nullable();
            $table->string('nik', 150)->nullable();
            $table->string('tempat_lahir', 200)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('m_jenis_kelamin_id', 20)->nullable();
            $table->string('m_agama_id', 20)->nullable();
            $table->string('m_hobi_id', 10)->nullable();
            $table->string('m_citacita_id', 10)->nullable();
            $table->string('jml_saudara', 20)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('m_asal_sekolah_id', 2)->nullable();
            $table->string('tahun_ajaran', 20)->nullable();
            $table->string('m_tingkat_kelas_id', 10)->nullable();
            $table->string('lembaga_rincian_ruangan_id', 150)->nullable();
            $table->string('npsn_sekolah_asal', 50)->nullable();
            $table->string('nama_sekolah_asal', 150)->nullable();
            $table->string('alamat_sekolah_asal', 200)->nullable();
            $table->string('tuna_rungu', 5)->nullable();
            $table->string('tuna_netra', 5)->nullable();
            $table->string('tuna_daksa', 5)->nullable();
            $table->string('tuna_grahita', 5)->nullable();
            $table->string('tuna_laras', 5)->nullable();
            $table->string('lamban_belajar', 5)->nullable();
            $table->string('sulit_belajar', 5)->nullable();
            $table->string('gangguan_komunikasi', 5)->nullable();
            $table->string('bakat_luar_biasa', 5)->nullable();
            $table->string('m_jenis_rumah_id', 5)->nullable();
            $table->string('alamat_siswa', 300)->nullable();
            $table->string('propinsi_siswa', 30)->nullable();
            $table->string('kabupaten_siswa', 30)->nullable();
            $table->string('kecamatan_siswa', 30)->nullable();
            $table->string('kelurahan_siswa', 500)->nullable();
            $table->string('kode_pos_siswa', 300)->nullable();
            $table->string('m_jarak_id', 5)->nullable();
            $table->string('m_transport_id', 5)->nullable();
            $table->mediumText('nomor_kk')->nullable();
            $table->string('nama_kepala_keluarga', 200)->nullable();
            $table->string('nama_ayah_kandung', 200)->nullable();
            $table->date('tahun_lahir_ayah_kandung')->nullable();
            $table->string('m_kondisi_ayah_kandung_id', 5)->nullable();
            $table->string('nik_ayah_kandung', 250)->nullable();
            $table->string('m_pendidikan_ayah_kandung_id', 5)->nullable();
            $table->string('m_pekerjaan_ayah_kandung_id', 5)->nullable();
            $table->string('nama_ibu_kandung', 250)->nullable();
            $table->date('tahun_lahir_ibu_kandung')->nullable();
            $table->string('m_kondisi_ibu_kandung_id', 10)->nullable();
            $table->string('nik_ibu_kandung', 250)->nullable();
            $table->string('m_pendidikan_ibu_kandung_id', 10)->nullable();
            $table->string('m_pekerjaan_ibu_kandung_id', 10)->nullable();
            $table->string('nama_wali', 200)->nullable();
            $table->date('tahun_lahir_wali')->nullable();
            $table->mediumText('nik_wali')->nullable();
            $table->string('m_pendidikan_wali_id', 30)->nullable();
            $table->string('m_pekerjaan_wali_id', 30)->nullable();
            $table->string('penghasilan_bulan', 30)->nullable();
            $table->string('nomor_kks', 150)->nullable();
            $table->string('nomor_pkh', 150)->nullable();
            $table->mediumText('nomor_kip')->nullable();
            $table->string('m_status_rumah_id', 2)->nullable();
            $table->string('alamat_ortu', 400)->nullable();
            $table->string('propinsi_ortu', 5)->nullable();
            $table->string('kabupaten_ortu', 5)->nullable();
            $table->string('kecamatan_ortu', 6)->nullable();
            $table->string('kelurahan_ortu', 250)->nullable();
            $table->string('kode_pos_ortu', 400)->nullable();
            $table->string('m_alasan_id', 5)->nullable();
            $table->string('besar_uang', 20)->nullable();
            $table->date('tanggal_keluar_madrasah')->default('1900-01-01');
            $table->string('m_status_siswa_keluar_id', 5)->nullable();
            $table->string('m_jenis_sekolah_id', 5)->nullable();
            $table->dateTime('created')->default('current_timestamp()');
            $table->string('createdby', 50)->nullable();
            $table->dateTime('updated')->default('current_timestamp()');
            $table->string('updatedby', 50)->nullable();
            $table->string('status', 2)->default('1');
            $table->string('jenjang', 10)->nullable();
            $table->integer('nama_pondok')->nullable();
            $table->string('nama_pondok2', 150)->nullable();
            $table->string('pimpinan_pondok', 50)->nullable();
            $table->string('alamat_pondok', 250)->nullable();
            $table->string('hp_pondok', 50)->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('nama_arab', 100)->nullable();
            $table->string('alamat_arab', 250)->nullable();
            $table->string('ayah_arab', 50)->nullable();
            $table->string('hp_siswa', 50)->nullable();
            $table->string('hp_ayah', 50)->nullable();
            $table->string('hp_ibu', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('kelas_mts', 1)->nullable();
            $table->integer('absen')->nullable();
            $table->string('noreg', 15)->nullable();
            $table->integer('pil_jurusan')->nullable();
            $table->string('kelas', 10)->default('baru');
            $table->integer('jurusan')->nullable();
            $table->integer('paralel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__alumni');
    }
}
