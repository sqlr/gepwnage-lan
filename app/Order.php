<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 *
 * @property Ticket $ticket
 * @property User $user
 *
 * @property float $price
 * @property string $status
 *
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */
class Order extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_CANCELLED = 'cancelled';

    const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_PAID,
        self::STATUS_CANCELLED,
    ];

    /** @inheritdoc */
    protected $casts = [
        'price' => 'double',
    ];

    /** @inheritdoc */
    protected $with = [
        'user',
        'ticket',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $value
     */
    public function setStatusAttribute($value)
    {
        if (in_array($value, static::STATUSES)) {
            $this->attributes['status'] = $value;
        }
    }
}
