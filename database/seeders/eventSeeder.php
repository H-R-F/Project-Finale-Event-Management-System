<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Calendar::factory(36)->create();
    }
}
