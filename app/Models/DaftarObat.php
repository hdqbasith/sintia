<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarObat
 *
 * @property integer $id
 * @property string $created_by
 * @property string $nama
 * @property string $satuan
 * @property integer $stok
 * @property integer $hargabeli
 * @property integer $hargajual
 * @property string $expired
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereHargabeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereHargajual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarObat extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'nama', 'satuan', 'stok', 'hargabeli', 'hargajual', 'expired', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
