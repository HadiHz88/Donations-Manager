<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'donor_name',
        'amount',
        'objective',
        'storage_location',
        'date_received',
        'notes',
    ];

    protected $casts = [
        'date_received' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the outcomes associated with this donation.
     */
    public function outcomes(): HasMany
    {
        return $this->hasMany(Outcome::class, 'source_donation_id');
    }

    /**
     * Get the remaining amount available from this donation.
     */
    public function getRemainingAmountAttribute(): float
    {
        $usedAmount = $this->outcomes()->sum('amount');
        return $this->amount - $usedAmount;
    }

    /**
     * Check if this donation has been fully utilized.
     */
    public function getIsCompleteAttribute(): bool
    {
        return $this->remaining_amount <= 0;
    }
}
