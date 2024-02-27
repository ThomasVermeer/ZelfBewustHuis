<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create('nl_NL');

            \App\Models\Project::create([
                'name' => $faker->word, 
                'status' => $faker->randomElement(['inDevelopment', 'ongoing', 'realised']),
                'description' => $faker->paragraph,
            ]);
        }
    }
}
