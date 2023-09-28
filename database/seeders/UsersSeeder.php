<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // DB::table('checklist')->insert([
    public function run()
    {
        \App\Models\User::create([
            'email' => 'administrator@mail.co',
            'date_birth' => '1999-06-09',
            'name' => 'admin',
            'password' => bcrypt('administrator'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'phone_number' => 1283939,
            'address' => 'Indonesia'
        ]);
        \App\Models\User::create([
            'email' => 'user@mail.co',
            'date_birth' => '1999-06-09',
            'name' => 'user',
            'password' => bcrypt('user'),
            'email_verified_at' => now(),
            'phone_number' => 1283939,
            'address' => 'Indonesia'
        ]);
    }
}
