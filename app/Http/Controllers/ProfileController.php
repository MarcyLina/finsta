<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create(Profile $profile)
    {
        return view('profiles.create', [
            'profile' => $profile,
        ]);
    }

    public function store(Request $request)
    {
        $profileData = request()->validate([
            'image' => 'nullable',
            'title' => 'nullable',
            'bio' => 'nullable',
            'url' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $profileData['image'] = $request->file('image')->store('images', 'public');
        }

        $profileData['user_id'] = auth()->id();

        Profile::create($profileData);

        return redirect(route('profile.show', $profileData['user_id']))->with('message', 'Your profile has been created!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $profile = $user->profile;

        $posts = $user->posts()->latest()->paginate(25);

        return view('profiles.show', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
        ]);
    }

    public function edit(Profile $profile, User $user)

    {   if (! $user->user_id = auth()->id()) {
            return view('403');
        }
        return view('profiles.edit',[
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    public function update(Request $request, Profile $profile, User $user)
    {
        $profileData = request()->validate([
            'image' => 'nullable',
            'title' => 'nullable',
            'bio' => 'nullable',
            'url' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $profileData['image'] = $request->file('image')->store('images', 'public');
        }

        $profile->update($profileData);

        return redirect(route('profile.show', $profile->user_id))->with('message', 'Your profile has been updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/')->with('message', 'Your account has been deleted!');
    }
}
