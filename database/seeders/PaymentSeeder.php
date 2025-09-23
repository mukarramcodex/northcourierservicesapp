<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('payments')->insert([
                'customer_id' => $faker->numberBetween(1, 20),
                'parcel_id' => $faker->numberBetween(1, 50),
                'amount' => $faker->randomFloat(2, 200, 5000),
                'method' => $faker->randomElement(['Cash', 'Credit Card', 'Bank Transfer']),
                'status' => $faker->randomElement(['Paid', 'Pending', 'Failed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
