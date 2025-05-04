<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'donor_name',
        'amount',
        'currency_id',
        'objective_id',
        'storage_location',
        'date_received',
        'notes',
    ];

    protected $casts = [
        'date_received' => 'date',
        'amount' => 'decimal:2',
    ];

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

    /**
     * Get the objective associated with the donation.
     */
    public function objective(): BelongsTo
    {
        return $this->belongsTo(Objective::class);
    }

    /**
     * Get the currency associated with the donation.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
