<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outcome extends Model
{
    /** @use HasFactory<\Database\Factories\OutcomeFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'amount',
        'currency_id',
        'target_organization',
        'date_sent',
        'payment_method',
        'notes',
    ];

    protected $casts = [
        'date_sent' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the currency that this outcome is related to.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
