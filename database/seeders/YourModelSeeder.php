<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YourModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // factory(Calendar::class, 10)->create();

        Calendar::factory(10)->create();

    }
}
