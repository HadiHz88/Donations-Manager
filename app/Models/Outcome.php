<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outcome extends Model
{
    /** @use HasFactory<\Database\Factories\OutcomeFactory> */
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'amount',
        'target_organization',
        'source_donation_id',
        'source_donation_ref',
        'date_sent',
        'payment_method',
        'notes',
        'receipt_received',
    ];

    protected $casts = [
        'date_sent' => 'date',
        'amount' => 'decimal:2',
        'receipt_received' => 'boolean',
    ];

    /**
     * Get the donation that this outcome is drawn from.
     */
    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class, 'source_donation_id');
    }
}
