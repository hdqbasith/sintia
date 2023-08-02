<?php

namespace App\Models;

use App\Traits\Uuids;
use Eloquent;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\AuthUser
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser role($roles, $guard = null)
 * @mixin Eloquent
 */
class AuthUser extends Eloquent
{
    use Uuids, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $primaryKey = 'id';
    protected $guard_name='web';
    protected $table = 'auth_users';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];


}
