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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Ticket extends Model
{
    /** @inheritdoc */
    protected $fillable = [
        'name',
        'stock',
        'price',
    ];

    /** @inheritdoc */
    protected $casts = [
        'stock' => 'integer',
        'price' => 'double',
    ];
}
