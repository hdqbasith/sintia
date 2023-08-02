<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property string $key
 * @property string $val
 * @property string|null $user
 * @property string|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereVal($value)
 * @mixin Eloquent
 */
class UserSetting extends Eloquent
{
    protected $fillable = [
        'key',
        'content',
        'user',
        'group'
    ];
    public $timestamps = false;
}
