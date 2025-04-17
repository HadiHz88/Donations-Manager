<?php

use App\Models\Currency;
use App\Models\Donation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('target_organization');
            $table->foreignIdFor(Donation::class, 'source_donation_id');
            $table->foreignIdFor(Currency::class, 'currency_id');
            $table->string('source_donation_ref');
            $table->date('date_sent');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('receipt_received')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};