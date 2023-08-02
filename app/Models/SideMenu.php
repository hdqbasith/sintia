<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SideMenu
 *
 * @property int $id
 * @property int $parent
 * @property int $order
 * @property string $name
 * @property string $link
 * @property string $level
 * @property int $active
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SideMenu extends Model
{
    use HasFactory;
}
