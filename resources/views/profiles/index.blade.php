<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1>{{ $user->username }}</h1>
        <a href="{{ route('posts.create') }}" class="p-2 border border-green-400">{{ __('Add New Post') }}</a>

        {{ $user->profile->title ?? '' }} <br>

        {{ $user->profile->bio ?? '' }} <br>

        {{ $user->profile->url ?? '' }}
    </div>
</x-app-layout>
