<x-app-layout>
    <header class="flex justify-center py-12 max-w-1/4">
        @include('partials.avatar', ['class' =>'h-36 w-36'])

        <div class="flex flex-col ml-8">
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

            @if (! $profile && $user->id === auth()->id())
                <a href="{{ route('profile.create', $user->id) }}" class="p-2 mr-8 text-center border border-black hover:underline">
                    Create profile
                </a>
            @elseif ($user->id === auth()->id())
                <div class="flex items-center">
                    <a href="{{ route('profile.edit', $user->id) }}" class="p-2 mr-4 text-center border border-black hover:underline">
                        Edit profile
                    </a>

                    <div x-data="{open: false}" class="relative">
                        <button @click="open = true" class="p-2 text-center border border-black hover:underline">
                            Delete my account
                        </button>

                        <div x-show="open" x-cloak x-transition class="absolute flex flex-col w-64 p-4 mt-4 bg-white border-4 border-red-700 -right-28 -top-40">
                            <p class="p-2 mb-6 text-lg text-center bg-gray-200">
                                Are you sure? this can't be undone.
                            </p>

                            <div class="p-2 mb-4 font-bold text-center underline cursor-pointer">
                                Nevermind, go back
                            </div>

                            <form @click.outside="open = false" action="/delete/{{ $user->id }}" method="post" class="p-2">
                                @csrf

                                @method('delete')

                                <button type="submit" class="p-2 font-bold text-red-700 transition-colors border-2 border-red-700 hover:bg-red-700 hover:text-white">
                                    Yes I'm sure, Delete my account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
