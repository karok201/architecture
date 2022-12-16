<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
    ];

    /**
     * Get city schools
     *
     * @return HasMany
     */
    public function city(): HasMany
    {
        return $this->hasMany(School::class);
    }
}
