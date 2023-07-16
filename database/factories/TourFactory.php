<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_id' => Travel::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'starting_date' => fake()->date(),
            'ending_date' => fake()->date(),
            'price' => fake()->randomFloat(2, 10, 999),
        ];
    }
}
