<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');

        for ($i = 0; $i < 5; $i++) {
            Employee::create([
                'name' => $faker->company,
                'image' => $faker->image('public/storage/img', 400, 300, null, false),
            ]);
        }
    }
}
