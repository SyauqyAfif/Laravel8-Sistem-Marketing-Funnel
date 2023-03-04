<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            // UserSeeder Admin
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'level' =>'admin',
                'password' => Hash::make('admin'),
            ]);

            // Staff
            DB::table('users')->insert([
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'level' =>'staff',
                'password' => Hash::make('staff'),
            ]);
        }
    }
}
