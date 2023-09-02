<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\PasienRecord
 *
 * @property int $id
 * @property int $pasien
 * @property string|null $subjective
 * @property string|null $objective
 * @property int|null $assessment
 * @property int|null $planning
 * @property string|null $detail
 * @property string|null $prescription
 * @property int|null $cost
 * @property int $klinik
 * @property string|null $admin
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereAssessment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereObjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePlanning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePrescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereSubjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PasienRecord extends Eloquent
{
    
    public function authUser()
    {
        return $this->belongsTo('App\Models\AuthUser', 'admin');
    }
    public function daftarDiagnoses()
    {
        return $this->belongsTo('App\Models\DaftarDiagnosis', 'assessment');
    }
    public function daftarTerapis()
    {
        return $this->belongsTo('App\Models\DaftarTerapi', 'planning');
    }
}
