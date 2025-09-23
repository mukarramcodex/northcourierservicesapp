<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('staffs')->insert([
                'name' => $faker->name,
                'role' => $faker->randomElement(['Manager', 'Driver', 'Dispatcher', 'Customer Support']),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'branch_id' => $faker->numberBetween(1, 3), // linking with branches
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
