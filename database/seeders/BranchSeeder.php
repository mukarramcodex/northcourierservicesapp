<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'code' => 'NCS-01',
                'name' => 'Gilgit Branch',
                'address' => 'Gilgit',
                'phone' => '021-111-222-333',
                'email' => 'gilgit@northcourierservices.pk',
                'city' => 'Gilgit',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'NCS-02',
                'name' => 'Lahore Branch',
                'address' => 'Lahore',
                'phone' => '042-444-555-666',
                'email' => 'lahore@northcourierservices.pk',
                'city' => 'lahore',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'NCS-03',
                'name' => 'Islamabad Branch',
                'address' => 'Islamabad',
                'phone' => '051-456-888-999',
                'email' => 'islamabad@northcourierservices.pk',
                'city' => 'Islamabad Capital',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'NCS-04',
                'name' => 'Rawalpindi Branch',
                'address' => 'Rawalpindi',
                'phone' => '051-789-333-786',
                'email' => 'rwp@northcourierservices.pk',
                'city' => 'Rawalpindi',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'NCS-05',
                'name' => 'Hunza Branch',
                'address' => 'Hunza',
                'phone' => '051-777-666-421',
                'email' => 'hunza@northcourierservices.pk',
                'city' => 'Hunza',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
