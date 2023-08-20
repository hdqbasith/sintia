<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PasienOdontogram
 *
 * @property int $id
 * @property int|null $pasien
 * @property int|null $number
 * @property int|null $left
 * @property int|null $top
 * @property int|null $right
 * @property int|null $bottom
 * @property int|null $condition
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property array|null $middle
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereMiddle($value)
 * @mixin Eloquent
 */
class PasienOdontogram extends Eloquent
{
    use HasFactory;
    protected $casts = [
        'left' => 'array',
        'top' => 'array',
        'right' => 'array',
        'bottom' => 'array',
        'middle' => 'array',
    ];
    public function daftarOdontogram()
    {
        return $this->belongsTo('App\Models\daftarOdontogram', 'condition');
    }
}
