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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->unsignedBigInteger('parcel_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();

            // Revenue details
            $table->decimal('amount', 10, 2);
            $table->date('revenue_date')->nullable();
            $table->string('source')->nullable(); // e.g., Delivery Charge, COD, Extra Fee
            $table->text('notes')->nullable();

            $table->timestamps();

            // // Foreign Keys
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('set null');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};
