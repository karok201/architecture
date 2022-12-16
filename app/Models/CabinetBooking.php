<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CabinetBooking extends Model
{
    protected $table = 'cabinet_booking';

    protected $fillable = [
        'cabinet_id',
        'user_id'
    ];

    /**
     * Get booking's cabinet
     *
     * @return BelongsTo
     */
    public function cabinet(): BelongsTo
    {
        return $this->belongsTo(Cabinet::class);
    }

    /**
     * Get booking's user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
