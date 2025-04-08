<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'donator_name',
        'objective_id',
        'amount',
        'spent',
        'store',
    ];

    /**
     * Get the objective associated with the donation.
     */
    public function objective(): BelongsTo
    {
        return $this->belongsTo(Objective::class);
    }
}