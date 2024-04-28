<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Calendar::factory(10)->create();


        // $this->call(UserFactory::class);


        $this->call(eventSeeder::class);

        User::factory()->create([
            // 'name' => 'Test User',
            // 'email' => 'test@example.com',
            'name' => 'achraf',
            'email' => 'achraf@gmail.com',
            'phone' => '0713684178',
            'gender' => 'men',
            'roleOfUser' => 'organizer',
            'city' => 'casablanca',
            'password' => Hash::make('achraf2001'),
        ]);

        // $imageIncrement = 1;
        // Calendar::insert([
        //     [
        //         'name' => fake()->sentence,
        //         'price' => fake()->numberBetween(10, 1000),
        //         'dateStart' => fake()->date(),
        //         'timeStart' => fake()->time(),
        //         'dateEnd' => fake()->date(),
        //         'timeEnd' => fake()->time(),
        //         'localisation' => fake()->address,
        //         'image' => fake()->imageUrl(),
        //         'categorie' => fake()->randomElement(['events', 'Concerts & Festival', 'Conference', 'Théâtre & Humour', 'Sport']),
        //         'description' => fake()->paragraph,
        //         'user_id' => fake()->id,
        //     ]
        
        // ]);
    }
}
