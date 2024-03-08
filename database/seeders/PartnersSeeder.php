<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');

        for ($i = 0; $i < 5; $i++) {
            Partner::create([
                'name' => $faker->company,
                'logo' => 'public/about_us/img/Project1.jpg',
            ]);
        }
    }
}
