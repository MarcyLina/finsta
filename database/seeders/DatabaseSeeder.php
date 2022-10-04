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
        User::factory(15)->create();
        Post::factory(95)->create();
        Profile::factory(126)->create();
    }
}
