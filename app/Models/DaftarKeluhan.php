<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarKeluhan
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $anamnesa
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereAnamnesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarKeluhan extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'kode', 'anamnesa', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
