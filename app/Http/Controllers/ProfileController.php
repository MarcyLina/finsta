<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::find($id);
        $user = User::find($id);

        return view('profiles.index', [
            'profile' => $profile,
            'user' => $user,
        ]);
    }
}
