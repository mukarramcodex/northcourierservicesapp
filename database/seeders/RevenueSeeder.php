<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('revenues')->insert([
                'branch_id' => $faker->numberBetween(1, 3),
                'month' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m'),
                'total_amount' => $faker->randomFloat(2, 50000, 300000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
