<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            'title' => 'nullable',
            'bio' => 'nullable',
            'url' => 'nullable'
        ]);

        // $profileData['image'] = $request->file('image')->store('images', 'public');

        $profileData['user_id'] = auth()->id();

        Profile::create($profileData);

        return redirect('/')->with('message', 'Your profile has been created!');
    }

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

    public function edit(Profile $profile)
    {
        return view('profiles.edit',[
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $profileData = request()->validate([
            'title' => 'nullable',
            'bio' => 'nullable',
            'url' => 'nullable',
        ]);

        // if ($request->hasFile('image')) {
        //     $profileData['image'] = $request->file('image')->store('images', 'public');
        // }

        $profile->update($profileData);

        return redirect(route('profile.show', $profile->id))->with('message', 'Your profile has been updated!');
    }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return redirect('/')->with('message', 'Your account has been deleted!');
    // }
}
