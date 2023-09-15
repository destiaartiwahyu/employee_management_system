<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PositionUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position_users')->insert([
            'position_id' => 1,
            'user_id' => 1
        ]);
        for($i = 2;$i < 11;$i ++){
            DB::table('position_users')->insert([
                'position_id' => $i,
                'user_id' => $i
            ]);
        }
    }
}
