<?php

namespace Database\Factories;

use App\Models\Wardrobe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ime' => fake()->word(), // jedinstveno ime komada
            'kategorija' => fake()->randomElement([ 'Shirt', 'Pants', 'Skirt', 'Dress', 'Jumper', 'Footwear' ]), 
            'boja' => fake()->colorName(), 
            'temperatura' => fake()->randomElement(['coldest', 'cold', 'warm', 'hot']), 
            'slika' => fake()->imageUrl(500, 500, 'styling', true, 'clothes'),
            'wardrobe_id' => Wardrobe::inRandomOrder()->first()->id ?? Wardrobe::factory(), 
        ];
    }
}
