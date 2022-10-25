<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory()
            ->count(5)
            ->hasPosts(5)
            ->hasComments(2)
            ->hasReplies(2)
            ->hasProfile(1)
            ->create();
    }
}
