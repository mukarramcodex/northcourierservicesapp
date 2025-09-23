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
                'role' => 'admin',
                'password' => bcrypt('Ali123!@#')
            ],
            [
                'name' => 'Khan',
                'email' => 'khan@northcourierservices.pk',
                'role' => 'staff',
                'password' => bcrypt('Qwe123!@#')
            ],
            [
                'name' => 'Nouman',
                'email' => 'nouman123@gmail.com',
                'role' => 'customer',
                'password' => bcrypt('Qwe123!@#')
            ],
            [
                'name' => 'Dildar',
                'email' => 'dildar@northcourierservices.pk',
                'role' => 'rider',
                'password' => bcrypt('Qwe123!@#')
            ]
        ]);
    }
}
