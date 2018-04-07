<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sponsor
 *
 * @package App
 *
 * @property int $id
 *
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sponsor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
