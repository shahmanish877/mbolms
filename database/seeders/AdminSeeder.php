<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'address' => 'Dharan',
            'dob' => '1998-07-07',
            'gender' => 'male',
            'user_name' => 'admin',
            'user_type' => 1,
            'user_status' => 1,
        ]);
    }
}
