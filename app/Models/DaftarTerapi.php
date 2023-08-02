<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarTerapi
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $terapi
 * @property string $biaya
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereTerapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarTerapi extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'kode', 'terapi', 'biaya', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
