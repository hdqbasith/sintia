<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\PasienRecord
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $tabel
 * @property integer $kode
 * @property integer $keterangan
 * @property integer $klinik
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PasienRecord extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['pasien', 'admin', 'tabel', 'kode', 'keterangan', 'klinik', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function daftarPasien()
    {
        return $this->belongsTo('App\Models\DaftarPasien', 'pasien');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'admin');
    }
}
