<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Factory as Faker;

class HousesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $images = ['house1.jpg', 'house2.jpg', 'house3.jpg', 'house4.jpg'];

        for ($i = 0; $i < 50; $i++) {
            House::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10000, 1000000),
                'address' => $faker->address,
                'image' => $faker->randomElement($images), 
            ]);
        }
    }
}