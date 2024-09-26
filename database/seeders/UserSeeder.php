<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('users')->where('email', 'ismoil_007u@gmail.com')->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'ismoil',
                'email' => 'ismoil_007u@gmail.com',
                'password' => Hash::make('ismoil_007u@gmail.com'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
