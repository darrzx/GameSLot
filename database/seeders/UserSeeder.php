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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'gender' => 'Male',
            'dob' => '2003-06-04',
            'role_id' => 1,
            'image' => 'profile.jpeg'
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'gender' => 'Male',
            'dob' => '2003-01-22',
            'role_id' => 2,
            'image' => 'profile.jpeg'
        ]);
    }
}
