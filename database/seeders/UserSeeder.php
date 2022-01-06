<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'full_name' => 'alysa',
                'email' => 'alsya@binus.ac.id',
                'password' => bcrypt('admin1'),
                'address' => 'semarang',
                'gender' => 'female',
                'role' => 'admin'
            ],
            [
                'full_name' => 'carissa',
                'email' => 'carissa@binus.ac.id',
                'password' => bcrypt('member1'),
                'address' => 'semarang kw',
                'gender' => 'male',
                'role' => 'member',

            ],
            [
                'full_name' => 'hansen',
                'email' => 'hansen@binus.ac.id',
                'password' => bcrypt('admin2'),
                'address' => 'tangerang',
                'gender' => 'male',
                'role' => 'admin'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
