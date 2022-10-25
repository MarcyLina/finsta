<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ReplyFactory extends Factory
{
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'comment_id' => Comment::factory(),
            'reply' => fake()->sentence(18),
        ];
    }
}
