<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarOdontogram
 *
 * @property integer $id
 * @property string $created_by
 * @property string $link_gambar
 * @property string $kode
 * @property string $arti
 * @property string $catatan
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereArti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereLinkGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarOdontogram extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'kode', 'arti', 'catatan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
