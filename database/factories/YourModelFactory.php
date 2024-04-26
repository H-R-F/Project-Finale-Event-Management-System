<?php

namespace Database\Factories;

use App\Models\Calendar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\YourModel>
 */
class YourModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(10, 1000),
            'dateStart' => $this->faker->date(),
            'timeStart' => $this->faker->time(),
            'dateEnd' => $this->faker->date(),
            'timeEnd' => $this->faker->time(),
            'localisation' => $this->faker->address,
            'image' => $this->faker->imageUrl(),
            'categorie' => $this->faker->randomElement(['events', 'Concerts & Festival', 'Conference', 'Théâtre & Humour', 'Sport']),
            'description' => $this->faker->paragraph,
            'user_id' => function () {
                return Calendar::factory()->create()->id;
            }
        ];
    }
}
