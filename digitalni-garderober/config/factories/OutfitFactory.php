<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outfit>
 */
class OutfitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime' => fake()->sentence(7), 
            'datum' => fake()->dateTimeBetween('now', '+1 year'), 
            'temperatura' => fake()->randomElement(['coldest', 'cold', 'warm', 'hot']), 
            'dogadjaj' => fake()->randomElement(['School', 'Party', 'Work day', 'Casual dinner', 'Fancy dinner', 'Gym day']),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
