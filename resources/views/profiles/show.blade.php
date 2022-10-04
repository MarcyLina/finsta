<x-app-layout>
    <header class="flex justify-center py-12 max-w-1/4">
        <div>
            <h1 class="mb-2 text-3xl">
                {{ $user->username }}
                <span class="block my-2 text-base text-gray-600">
                    {{ $user->name }}
                </span>
            </h1>

            <div class="grid grid-cols-4 mb-5 font-semibold text-gray-600">
                <p>42 Posts</p>
                <p>42 Followers</p>
            </div>

            <p class="text-lg font-bold">{{ $profile->title ?? '' }}</p> <br>

            <p class="max-w-2xl">{{ $profile->bio ?? '' }}</p> <br>

            <a href="{{ $profile->url ?? '' }}" class="hover:underline">{{ $profile->url ?? '' }}</a>
        </div>

        {{-- @if ($profile->user_id === auth()->id()) --}}
            <div class="flex justify-center">
                <a href="/{{ $profile->id }}/edit" class="mr-8 hover:underline">
                    Edit profile
                </a>
            </div>
        {{-- @endif --}}
    </header>

    <div class="grid grid-cols-3 max-w-[1400px] mx-auto">
        @foreach ($posts as $post )
            <x-post :post="$post" class="m-0" />
        @endforeach
    </div>

</x-app-layout>
