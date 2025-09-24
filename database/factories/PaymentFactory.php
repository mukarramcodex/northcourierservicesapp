<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Parcel;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parcel_id' => Parcel::factory(),
            'customer_id' => Customer::factory(),
            'staff_id' => Staff::factory(),
            'branch_id' => Branch::factory(),
            'amount' => $this->faker->randomFloat(),
            'method' => $this->faker->randomElement(['cash', 'credit', 'debit', 'transfered', 'EasyPaisa/JazzCash']),
            'transaction_id' => $this->faker->uuid(),
            'status' => $this->faker->randomElement(['pending', 'paid']),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'paid_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'note' => $this->faker->text(),
        ];
    }
}
