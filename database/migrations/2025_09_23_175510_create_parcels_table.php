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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();

            // Tracking
            $table->string('tracking_number')->unique();
            $table->string('booking_id')->unique();
            $table->string('receipt_number')->nullable();
            $table->string('qr_code')->nullable();

            // Sender / Receiver
            $table->unsignedBigInteger('customer_id')->nullable(); // Sender
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email');
            $table->string('receiver_address');
            $table->string('receiver_cnic', 15)->nullable();

            // Parcel Info
            $table->string('parcel_type')->nullable(); // e.g., Document, Box, Fragile
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('stack')->nullable();
            $table->string('dimension')->nullable();
            $table->string('goods_description')->nullable();
            $table->text('remarks')->nullable();
            $table->decimal('fare', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();

            // Status
            $table->enum('status', [
                'pending', 'in transit', 'delivered', 'cancelled'
            ])->default('pending');

            // Branch & Staff
            $table->unsignedBigInteger('origin_branch_id')->nullable();
            $table->unsignedBigInteger('destination_branch_id')->nullable();
            $table->unsignedBigInteger('assigned_staff_id')->nullable();

            // Delivery Info
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->date('booking_time')->nullable();

            // // Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('origin_branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('destination_branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('assigned_staff_id')->references('id')->on('staffs')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
