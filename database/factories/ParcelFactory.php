<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcel>
 */
class ParcelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tracking_number' => 'NCS' . str_pad($this->faker->unique()->numberBetween(1, 999999), 6, '0', STR_PAD_LEFT),
            'booking_id' => str_pad($this->faker->unique()->numberBetween(1, 999999), 6, '0', STR_PAD_LEFT),
            'receipt_number' => str_pad($this->faker->unique()->numberBetween(10000, 99999), 5, '0', STR_PAD_LEFT),
            'qr_code' => $this->faker->uuid(),

            // Sender / Receiver
            'customer_id' => Customer::inRandomOrder()->first()->id ?? Customer::factory(),
            'receiver_name' => $this->faker->name,
            'receiver_phone' => $this->faker->unique()->numerify('03#########'),
            'receiver_cnic' => $this->faker->unique()->numerify('#############'),
            'receiver_address' => $this->faker->address(),
            'receiver_email' => $this->faker->unique()->safeEmail(),

            // Parcel Info
            'parcel_type' => $this->faker->randomElement([
                'Box',
                'Envelop',
                'Fragile',
                'Bag',
                'Parcel',
                'Small_parcel',
                'Courier',
                'Stack'
            ]),
            'weight' => $this->faker->numberBetween(0.5, 40) . 'kg',
            'dimension' => $this->faker->randomElement([
                '10X1010',
                '12X15X8',
                '20X20X15'
            ]),
            'goods_description' => $this->faker->sentence(5, true),
            'remarks' => $this->faker->optional()->randomElement([
                'Deliver before 6 PM.',
                'Handle with care, fragile item.',
                'Customer will collect from branch.',
                'Ensure proper documentation is attached.',
                'Keep upright during transport.'
            ]),

            // Charges
            'fare' => $this->faker->numberBetween(250, 5000),
            'discount' => $this->faker->numberBetween(0, 500),
            'amount' => $this->faker->numberBetween(500, 6000),
            'total_amount' => $this->faker->numberBetween(1000, 6000),
            'payment_type' => $this->faker->randomElement(['Cash', 'Card', 'Online']),
            'received_amount' => $this->faker->numberBetween(500, 5000),
            'due_amount' => $this->faker->numberBetween(0, 2000),


            // Status
            'status' => $this->faker->randomElement(['Pending', 'In Transit', 'Delivered']),

            // Branch & Staff
            'origin_branch_id' => Branch::inRandomOrder()->first()->id ?? Branch::factory(),
            'destination_branch_id' => Branch::inRandomOrder()->first()->id ?? Branch::factory(),
            'assigned_staff_id' => Staff::inRandomOrder()->first()->id ?? Staff::factory(),

            // Delivery Info
            'shipped_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'delivered_at' => fake()->dateTimeBetween('now', '+1 month'),
            'origin' => $this->faker->randomElement([
                'Karachi',
                'Lahore',
                'Islamabad',
                'Rawalpindi',
                'Peshawar',
                'Multan',
                'Faisalabad',
                'Quetta',
                'Jhelum'
            ]),
            'destination' => $this->faker->randomElement([
                'Karachi',
                'Lahore',
                'Islamabad',
                'Rawalpindi',
                'Peshawar',
                'Multan',
                'Faisalabad',
                'Quetta',
                'Jhelum'
            ]),
            'booking_time' => $this->faker->dateTimeBetween('-2 week', 'now'),

            // Risk & Claim
            'send_risk' => $this->faker->randomElement(['YES', 'NO']),
            'claim' => $this->faker->randomElement(['YES', 'NO']),
            'time_limit' => $this->faker->randomElement(['YES', 'NO']),
        ];
    }
}
