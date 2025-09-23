<?php

namespace Database\Seeders;

use App\Http\Controllers\ParcelController;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ RoleSeeder::class ]);
        $this->call([ UserSeeder::class ]);
        $this->call([ BranchSeeder::class ]);
        $this->call([ CustomerSeeder::class ]);
        $this->call([ ParcelController::class ]);
        $this->call([ PaymentSeeder::class ]);
        $this->call([ RevenueSeeder::class ]);

    }
}
