<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarCheckup
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $target
 * @property string $satuan
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarCheckup extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'kode', 'target', 'satuan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
