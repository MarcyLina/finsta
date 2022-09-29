<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Post::factory(257)->create();

        \App\Models\User::factory(35)->create();

        \App\Models\User::factory()->create([
            'name' => 'Marcy',
            'email' => 'marcy@marcy.com',
            'password' => 'password',
        ]);
    }
}
