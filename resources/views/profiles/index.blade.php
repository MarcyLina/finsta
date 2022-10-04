<x-app-layout>
    <div class="py-12 text-center">
        <h1>{{ $user->username }} welcome to my profile</h1>


        {{ $profile->title ?? '' }} <br>

        {{ $profile->bio ?? '' }} <br>

        {{ $profile->url ?? '' }}
    </div>
</x-app-layout>
