<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $furnitures = [
            [
                'name' => 'Jessheim',
                'price' => 12000,
                'type' => 'carpet',
                'color' => 'blue',
                'image' => '1'
            ],
            [
                'name' => 'Grimsbu',
                'price' => 1000000,
                'type' => 'bed',
                'color' => 'white',
                'image' => '2'
            ],
            [
                'name' => 'Antlop',
                'price' => 200000,
                'type' => 'chair',
                'color' => 'white',
                'image' => '3'
            ],
            [
                'name' => 'Mammut',
                'price' => 85000,
                'type' => 'chair',
                'color' => 'white',
                'image' => '4'
            ]
            ];

            DB::table('furnitures')->insert($furnitures);
    }
}
