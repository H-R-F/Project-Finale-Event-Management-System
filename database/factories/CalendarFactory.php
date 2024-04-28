<?php

// CalendarFactory.php
namespace Database\Factories;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalendarFactory extends Factory
{
    protected $model = Calendar::class;

    // Static counters for each category to keep track of the sequential numbers
    protected static $categoryCounters = [
        'Concerts & Festivals' => 0,
        'Conference' => 0,
        'Théâtre & Humour' => 0,
        'Sport' => 0,
    ];

    public function definition()
    {
        // Get a random category
        $categories = ['Concerts & Festivals', 'Conference', 'Théâtre & Humour', 'Sport', 'Autres'];
        $category = $this->faker->randomElement($categories);
    
        // Increment the counter for the selected category
        if (!isset(self::$categoryCounters[$category])) {
            self::$categoryCounters[$category] = 0;
        }
        self::$categoryCounters[$category]++;
    
        // Ensure the counter for the selected category doesn't exceed 5
        self::$categoryCounters[$category] = self::$categoryCounters[$category] > 5 ? 1 : self::$categoryCounters[$category];
    
        // Construct the filename with the category and the sequential number
        $filename = $category . self::$categoryCounters[$category] . '.jpg'; // You can change the extension if needed
    
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10, 1000),
            'dateStart' => $this->faker->date(),
            'timeStart' => $this->faker->time(),
            'dateEnd' => $this->faker->date(),
            'timeEnd' => $this->faker->time(),
            'localisation' => $this->faker->address(),
            'image' => $filename, // Use the dynamically generated filename
            'categorie' => $category,
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
