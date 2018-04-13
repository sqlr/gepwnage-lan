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
 * @property null|Carbon $start
 * @property null|Carbon $end
 *
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */
class Event extends Model
{
    /** @inheritdoc */
    protected $fillable = [
        'name',
        'start',
        'end',
    ];

    /** @inheritdoc */
    protected $dates = [
        'start',
        'end',
    ];
}
