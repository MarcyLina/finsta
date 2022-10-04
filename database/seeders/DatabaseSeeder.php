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
            ->count(15)
            ->hasPosts(10)
            ->hasProfile(1)
            ->create();
    }
}
