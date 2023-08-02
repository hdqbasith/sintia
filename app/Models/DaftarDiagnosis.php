<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\DaftarDiagnosis
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $diagnosis
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DaftarDiagnosis extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['created_by', 'kode', 'diagnosis', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'created_by');
    }
}
