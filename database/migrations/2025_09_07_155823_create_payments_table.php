<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->nullable();   // Payment linked to a parcel
            $table->unsignedBigInteger('customer_id')->nullable(); // Who paid
            $table->unsignedBigInteger('staff_id')->nullable();    // Collected by which staff
            $table->unsignedBigInteger('branch_id')->nullable();   // At which branch

            $table->decimal('amount', 10, 2);
            $table->enum('method', ['cash', 'card', 'bank_transfer', 'online'])->default('cash');
            $table->string('transaction_id')->nullable(); // For online/bank payments
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            // $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('set null');
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            // $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
            // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_tables');
    }
};
