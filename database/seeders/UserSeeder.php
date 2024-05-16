<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname' => 'M Bimo',
            'lname' => 'Bayu Bagsakara',
            'email' => 'm.bimo.bayu.bagaskara-2022@fst.unair.ac.id',
            'password' => bcrypt('biyura123'),
            'address' => 'Jl. Raya Darmo Permai III Blok A No. 1',
            'role' => 'patient',
            'date_of_birth' => '2000-12-12',
            'phone' => '081234567890',
        ]);
        User::create([
            'fname' => 'Micheal',
            'lname' => 'Jordan',
            'email' => 'michealjordan@gmail.com',
            'password' => bcrypt('doctor'),
            'address' => 'Jl. Raya Darmo Permai III Blok A No. 1',
            'role' => 'doctor',
            'date_of_birth' => '2000-12-12',
            'phone' => '081234567890',
        ]);
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
