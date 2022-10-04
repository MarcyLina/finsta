<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->sentence(5),
            'bio' => fake()->imageUrl(18),
            'url' => fake()->url(),
            'user_id' => User::factory(),
        ];
    }
}
