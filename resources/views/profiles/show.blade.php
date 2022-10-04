<x-app-layout>
    <header class="flex justify-center py-12 max-w-1/4">
        <img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ" alt="user avatar" class="object-cover w-32 h-32 mr-8 bg-blue-300 rounded-full">

        <div class="flex flex-col">
            <h1 class="mb-4 text-3xl">
                {{ $user->username }}
                <span class="block my-2 text-base text-gray-600">
                    {{ $user->name }}
                </span>
            </h1>

            <div class="grid grid-cols-4 mb-5 font-semibold text-gray-600">
                <p>42 Posts</p>
                <p>42 Followers</p>
            </div>

            <p class="mb-4 text-lg font-bold">
                {{ $user->profile->title ?? '' }}
            </p>

            <p class="max-w-2xl mb-4">
                {{ $user->profile->bio ?? '' }}
            </p>

            <a href="{{ $profile->url ?? '' }}" class="mb-4 hover:underline">
                {{ $user->profile->url ?? '' }}
            </a>

            @if (! $user->profile->title === null && $user->id === auth()->id())
                <a href="{{ route('profile.create', $user->id) }}" class="p-2 mr-8 text-center border border-black hover:underline">
                    Create profile
                </a>
            @elseif ($user->id === auth()->id())
                <a href="#" class="p-2 mr-8 text-center border border-black hover:underline">
                    Edit profile
                </a>
            @endif
        </div>
    </header>

    @if ($posts)
        <div class="grid grid-cols-3 max-w-[1400px] mx-auto">
            @foreach ($posts as $post )
                <x-post :post="$post" class="m-0" />
            @endforeach
        </div>
    @endif

</x-app-layout>
