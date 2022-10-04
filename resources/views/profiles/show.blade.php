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

            <p class="">{{ $profile->bio ?? '' }}</p> <br>

            <p>{{ $profile->url ?? '' }}</p>
        </div>
    </header>

    <div class="grid grid-cols-3 max-w-[1400px] mx-auto">
        @foreach ($posts as $post )
            <x-post :post="$post" class="m-0" />
        @endforeach
    </div>

    {{-- @dd($user->profile) --}}
</x-app-layout>
