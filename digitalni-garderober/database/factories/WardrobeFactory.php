<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wardrobe>
 */
class WardrobeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime' => fake()->word() . ' Wardrobe', 
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), 
        ];
    }
}
