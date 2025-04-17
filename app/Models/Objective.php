<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objective extends Model
{
    /** @use HasFactory<\Database\Factories\ObjectiveFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Get the donations associated with the objective.
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}