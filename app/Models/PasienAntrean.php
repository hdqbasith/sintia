<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\PasienAntrean
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $nomor
 * @property string $kehadiran
 * @property string $booking_mulai
 * @property string $booking_selesai
 * @property integer $klinik
 * @property boolean $online
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereBookingMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereBookingSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereKehadiran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PasienAntrean extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['pasien', 'admin', 'nomor', 'kehadiran', 'booking_mulai', 'booking_selesai', 'klinik', 'online', 'created_at', 'updated_at'];

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
