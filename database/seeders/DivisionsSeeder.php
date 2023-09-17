<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'name' => 'IT',
            'description' => 'IT Maintaince'
        ]);
        DB::table('divisions')->insert([
            'name' => 'Finance',
            'description' => 'Finance adalah bagian yang mengelola dan memegang uang secara langsung baik dalam bentuk uang kartal maupun uang giral. Pengertian finance adalah seni dalam mengelola uang yang memengaruhi kehidupan setiap orang atau organisasi'
        ]);
        DB::table('divisions')->insert([
            'name' => 'HR',
            'description' => 'Human resources (HR) is the division of a business that is charged with finding, recruiting, screening, and training job applicants. It also administers employee benefit programs.HR plays a key role in helping companies deal with a fast-changing business environment and a greater demand for quality employees in the 21st century.'
        ]);
    }
}
