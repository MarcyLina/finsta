<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'caption' => fake()->sentence(),
            'image' => fake()->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}
