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
            $table->decimal('amount', 10, 2);
            $table->string('target_organization');
            $table->foreignIdFor(Currency::class, 'currency_id');
            $table->string('source_donation_ref')->nullable();
            $table->date('date_sent');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
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
