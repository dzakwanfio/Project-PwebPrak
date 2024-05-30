<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname' => 'Dzakwan',
            'lname' => 'Fiodora Syafi`i',
            'email' => 'dzakwan.fiodora.syafii@gmail.com',
            'password' => bcrypt('dzakwan'),
            'address' => 'Surabaya',
            'role' => 'admin',
            'date_of_birth' => '2000-12-12',
            'phone' => '081234567890',
        ]);
    }
}
