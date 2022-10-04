<x-app-layout>
    <div class="py-12 text-center">
        <h1>{{ $user->username }} welcome to my profile</h1>

        <p>{{ $profile->title ?? '' }}</p> <br>

        <p>{{ $profile->bio ?? '' }}</p> <br>

        <p>{{ $profile->url ?? '' }}</p>
    </div>

    {{-- @dd($user->profile) --}}
</x-app-layout>
