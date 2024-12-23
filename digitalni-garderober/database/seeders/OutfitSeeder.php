<?php

namespace Database\Seeders;

use App\Models\Outfit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Outfit::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
