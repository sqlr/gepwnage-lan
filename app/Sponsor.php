<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 *
 * @property string $slug
 *
 * @property string $name
 *
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */
class Sponsor extends Model
{
    /** @inheritdoc */
    protected $primaryKey = 'slug';

    /** @inheritdoc */
    protected $keyType = 'string';

    /** @inheritdoc */
    public $incrementing = false;

    /** @inheritdoc */
    protected $fillable = [
        'slug',
        'name',
    ];
}
