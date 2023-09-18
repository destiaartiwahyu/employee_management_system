<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Position::create([
            'name' => 'Frontend Developer',
            'salary' => 2000000,
            'description' => 'A Front-End Developer is someone who creates websites and web applications. The difference between Front-End and Back-End is that Front-End refers to how a web page looks, while back-end refers to how it works. You can think of Front-End as client-side and Back-End as server-side.',
            'division_position_id' => 1,
            'level' => 'intern'
        ]);
        \App\Models\Position::create([
            'name' => 'Frontend Developer',
            'salary' => 5000000,
            'description' => 'A Front-End Developer is someone who creates websites and web applications. The difference between Front-End and Back-End is that Front-End refers to how a web page looks, while back-end refers to how it works. You can think of Front-End as client-side and Back-End as server-side.',
            'division_position_id' => 1,
            'level' => 'junior'
        ]);
        \App\Models\Position::create([
            'name' => 'Frontend Developer',
            'salary' => 7000000,
            'description' => 'A Front-End Developer is someone who creates websites and web applications. The difference between Front-End and Back-End is that Front-End refers to how a web page looks, while back-end refers to how it works. You can think of Front-End as client-side and Back-End as server-side.',
            'division_position_id' => 1,
            'level' => 'mid'
        ]);
        \App\Models\Position::create([
            'name' => 'Frontend Developer',
            'salary' => 10000000,
            'description' => 'A Front-End Developer is someone who creates websites and web applications. The difference between Front-End and Back-End is that Front-End refers to how a web page looks, while back-end refers to how it works. You can think of Front-End as client-side and Back-End as server-side.',
            'division_position_id' => 1,
            'level' => 'senior'
        ]);
        \App\Models\Position::create([
            'name' => 'Backend Developer',
            'salary' => 2000000,
            'description' => 'Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites.',
            'division_position_id' => 1,
            'level' => 'intern'
        ]);
        \App\Models\Position::create([
            'name' => 'Backend Developer',
            'salary' => 5100000,
            'description' => 'Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites.',
            'division_position_id' => 1,
            'level' => 'junior'
        ]);
        \App\Models\Position::create([
            'name' => 'Backend Developer',
            'salary' => 7100000,
            'description' => 'Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites.',
            'division_position_id' => 1,
            'level' => 'mid'
        ]);
        \App\Models\Position::create([
            'name' => 'Backend Developer',
            'salary' => 11000000,
            'description' => 'Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites.',
            'division_position_id' => 1,
            'level' => 'senior'
        ]);
        \App\Models\Position::create([
            'name' => 'Accountant',
            'salary' => 1800000,
            'description' => 'Accountants and auditors prepare and examine financial records, identify potential areas of opportunity and risk, and provide solutions for businesses and individuals.',
            'division_position_id' => 2,
            'level' => 'intern'
        ]);
        \App\Models\Position::create([
            'name' => 'Accountant',
            'salary' => 4800000,
            'description' => 'Accountants and auditors prepare and examine financial records, identify potential areas of opportunity and risk, and provide solutions for businesses and individuals.',
            'division_position_id' => 2,
            'level' => 'junior'
        ]);
        \App\Models\Position::create([
            'name' => 'Accountant',
            'salary' => 7200000,
            'description' => 'Accountants and auditors prepare and examine financial records, identify potential areas of opportunity and risk, and provide solutions for businesses and individuals.',
            'division_position_id' => 2,
            'level' => 'mid'
        ]);
        \App\Models\Position::create([
            'name' => 'Accountant',
            'salary' => 21000000,
            'description' => 'Accountants and auditors prepare and examine financial records, identify potential areas of opportunity and risk, and provide solutions for businesses and individuals.',
            'division_position_id' => 2,
            'level' => 'senior'
        ]);
    }
}
