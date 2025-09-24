<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Parcel;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revenue>
 */
class RevenueFactory extends Factory
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
            'branch_id' => Branch::factory(),
            'staff_id' => Staff::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'revenue_date' => $this->faker->date(),
            'source' => $this->faker->word(),
            'notes' => $this->faker->text(),
        ];
    }
}
