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
                'type' => 'bed',
                'color' => 'blue',
                'image' => 'product-image/example1.jpg'
            ],
            [
                'name' => 'Grimsbu',
                'price' => 1000000,
                'type' => 'bed',
                'color' => 'white',
                'image' => 'product-image/example2.jpg'
            ],
            [
                'name' => 'Antlop',
                'price' => 200000,
                'type' => 'chair',
                'color' => 'white',
                'image' => 'product-image/example3.jpg'
            ],
            [
                'name' => 'Mammut',
                'price' => 85000,
                'type' => 'chair',
                'color' => 'white',
                'image' => 'product-image/example4.jpg'
            ]
            ];

            DB::table('furnitures')->insert($furnitures);
    }
}
