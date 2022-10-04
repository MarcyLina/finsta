<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        $profile = Profile::find($id);

        return view('profiles.show', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
