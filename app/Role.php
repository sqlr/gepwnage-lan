<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 *
 * @property string $slug
 * @property string $name
 *
 * @property Collection $users
 */
class Role extends Model
{
    /**
     * @inheritdoc
     */
    protected $primaryKey = 'slug';

    /**
     * @inheritdoc
     */
    protected $keyType = 'string';

    /**
     * @inheritdoc
     */
    public $incrementing = false;

    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * Users belonging to the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('users');
    }
}
