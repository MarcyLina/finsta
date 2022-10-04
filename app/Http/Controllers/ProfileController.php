<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        $profile = Profile::find($id);

        $posts = $user->posts()->latest()->paginate(25);

        return view('profiles.show', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
        ]);
    }
}
