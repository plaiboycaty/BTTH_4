<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->randomNumber(2),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 400', 'Lenovo ThinkCentre M720']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 22.04', 'macOS Monterey']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600X', 'Intel Core i7-11700']),
                'memory' => $faker->randomElement([8, 16, 32, 64]),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
