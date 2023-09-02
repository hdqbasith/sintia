<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\PasienCheckup
 *
 * @property int $id
 * @property int $pasien
 * @property string $tabel
 * @property int|null $kode
 * @property int|null $keterangan
 * @property int $klinik
 * @property string|null $admin
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereUpdatedAt($value)
 * @property-read \App\Models\AuthUser|null $authUser
 * @property-read \App\Models\DaftarPasien $daftarPasien
 * @mixin Eloquent
 */
class PasienCheckup extends Eloquent
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
