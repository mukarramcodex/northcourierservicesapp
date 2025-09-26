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
            'tracking_number' => 'NCS' . $this->faker->unique()->numerify('######'),
            'booking_id' => $this->faker->unique()->numerify('####'),
            'receipt_number' => $this->faker->unique()->numberBetween(01,9999),
            'customer_id' => Customer::all()->random()->id,
            'receiver_name' => $this->faker->randomElement([
                'Unver Kharal',
                'Alakurt Shambhani',
                'Shaamikh Ibrahim',
                'Hooman Dar',
                'Sait Longi',
                'Tekinalp Orakzai',
                'Beser Mahsud',
                'Erkin Sabzvari',
                'Jaarallah Muhammadzai',
                'Ahmed Bukhari',
                'Sooran Kenagzai',
                'Bastug Mughal',
                'Siddeeqi Jalbani',
                'Yolbul Bappi',
                'Kaamil Saadi'
            ]),
            'receiver_phone' => $this->faker->unique()->numerify('03#########'),
            'receiver_cnic' => $this->faker->unique()->numerify('#####-#######-#'),
            'receiver_address' => $this->faker->address(),
            'receiver_email' => $this->faker->unique()->safeEmail(),
            // 'delivery_date' => $this->faker->dateTimeBetween('+2 days', '+10 days')->format('d-m-Y'),
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
            'shipped_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'delivered_at' => fake()->dateTimeBetween('now', '+1 month'),
            'dimension' => $this->faker->randomElement([
                '10X1010',
                '12X15X8',
                '20X20X15'
            ]),
            'parcel_type' => $this->faker->randomElement([
                'box',
                'envelop',
                'cotton',
                'bag',
                'parcel',
                'small_parcel',
                'courier',
                'small_courier'
            ]),
            'stack' => $this->faker->numberBetween(1, 12),
            'goods_description' => $this->faker->sentence(5),
            'remarks' => $this->faker->sentence(5),
            'fare' => $this->faker->randomFloat(248, 152, 2300, 459, 230, 250, 5000, 460, 3200, 1149, 1278, 560, 4560, 1230, 4890, 456),
            'discount' => $this->faker->randomFloat(5, 6, 8, 15, 45, 50, 25, 13, 5, 9, 2, 10, 5, 7),
            'amount' => $this->faker->randomFloat(248, 152, 2300, 459, 230, 250, 5000, 460, 3200, 1149, 1278, 560, 4560, 1230, 4890, 456),
            'total_amount' => $this->faker->randomFloat(248, 152, 2300, 459, 230, 250, 5000, 460, 3200, 1149, 1278, 560, 4560, 1230, 4890, 456),
            'booking_time' => $this->faker->dateTimeBetween('-2 week', 'now'),
            'weight' => $this->faker->randomFloat(2, 1, 10, 0.5, 0.7, 25, 50),
            // 'price' => $this->faker->randomFloat(250, 138, 1740, 5680, 540, 3570, 540),
            'origin_branch_id' => Branch::all()->random()->name,
            'destination_branch_id' => Branch::all()->random()->name,
            'assigned_staff_id' => Staff::all()->random()->name,
            'status' => $this->faker->randomElement(['Pending', 'In Transit', 'Delivered']),
        ];
    }
}
