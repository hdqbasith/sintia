<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\PasienTransaksi
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $tabel
 * @property integer $kode
 * @property integer $tarif
 * @property boolean $kuantitas
 * @property integer $harga
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereKuantitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereTarif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PasienTransaksi extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['pasien', 'admin', 'tabel', 'kode', 'tarif', 'kuantitas', 'harga', 'created_at', 'updated_at'];

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
