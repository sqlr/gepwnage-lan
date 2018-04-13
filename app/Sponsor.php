<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 *
 * @property int $id
 *
 * @property string $name
 *
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */
class Sponsor extends Model
{
    /** @inheritdoc */
    protected $fillable = [
        'name',
    ];
}
