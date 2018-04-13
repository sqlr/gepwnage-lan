<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @package App
 *
 * @property int $id
 * @property null|int $gewis_id
 *
 * @property Collection $groups
 * @property Collection $roles
 *
 * @property string $name
 * @property string $email
 * @property string $password
 *
 * @property null|string $remember_token
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @property null|Carbon $deleted_at
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /** @inheritdoc */
    protected $fillable = [
        'gewis_id',
        'name',
        'email',
        'password',
    ];

    /** @inheritdoc */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @inheritdoc */
    protected $with = [
        'groups',
        'roles',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
