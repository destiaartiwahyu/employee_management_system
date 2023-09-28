<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(DivisionsSeeder::class);
        $this->call(PositionsSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(PositionUsersSeeder::class);
        \App\Models\Division::factory(10)->create();

    }
}
