<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 *
 * @property int $id
 *
 * @property Collection|Group[] $groups
 * @property Collection|Order[] $orders
 *
 * @property string $name
 * @property null|int $stock
 * @property double $price
 *
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
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

    /** @inheritdoc */
    protected $with = [
        'groups',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
