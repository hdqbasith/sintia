<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarPasien
 *
 * @property integer $id
 * @property string $created_by
 * @property string $nomor_rm
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $nik
 * @property string $gender
 * @property string $pekerjaan
 * @property string $alamat
 * @property string $hp
 * @property string $goldar
 * @property string $akun
 * @property integer $klinik
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @property PasienAntrean[] $pasienAntreans
 * @property PasienRecord[] $pasienRecords
 * @property PasienTransaksi[] $pasienTransakses
 * @property string|null $bpjs
 * @property-read int|null $pasien_antreans_count
 * @property-read int|null $pasien_records_count
 * @property-read int|null $pasien_transakses_count
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereBpjs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereGoldar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNomorRm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarPasien extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'nomor_rm', 'nama', 'tempat_lahir', 'tanggal_lahir', 'nik', 'bpjs', 'gender', 'pekerjaan', 'alamat', 'hp', 'goldar', 'akun', 'klinik', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasienAntreans()
    {
        return $this->hasMany('App\Models\PasienAntrean', 'pasien');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasienRecords()
    {
        return $this->hasMany('App\Models\PasienRecord', 'pasien');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasienTransakses()
    {
        return $this->hasMany('App\Models\PasienTransaksi', 'pasien');
    }
}
