<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::insert([
            [
                'name' => 'Kashan',
                'email' => 'kashan@northcourierservices.pk',
                'role' => 'admin',
                'password' => bcrypt('Kashan123!@#')
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@northcourierservices.pk',
                'role' => 'staff',
                'password' => bcrypt('Ali123!@#')
            ]
        ]);
    }
}
