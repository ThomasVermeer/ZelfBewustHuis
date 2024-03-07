<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Employee;
use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');

        $partnerId = Partner::inRandomOrder()->first()->id;
        $employeeId = Employee::inRandomOrder()->first()->id;

        AboutUs::create([
            'text' => $faker->paragraph,
            'image' => 'public/about_us/img/Project1.jpg',
            'partner_id' => $partnerId,
            'employee_id' => $employeeId,
        ]);
    }
}
