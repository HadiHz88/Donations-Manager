<?php

use App\Models\Currency;
use App\Models\Objective;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->decimal('amount', 10, 2);
            $table->foreignIdFor(Currency::class);
            $table->foreignIdFor(Objective::class);
            $table->string('storage_location');
            $table->date('date_received');
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
