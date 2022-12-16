<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cabinet extends Model
{
    protected $table = 'cabinets';

    protected $fillable = [
        'name',
        'school_id'
    ];

    /**
     * Get cabinet's school
     *
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
