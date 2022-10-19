<x-app-layout>
    <x-post-show :post="$post" />

    @if ($post->user_id === auth()->id())
        <div class="flex justify-center">
            <a href="/p/{{ $post->id }}/edit" class="mr-8 hover:underline">
                Edit this post
            </a>

            <div x-data="{open: false}" class="relative">
                <a href="#" @click="open = true" class="p-2 text-center border border-black hover:underline">
                    Delete this post
                </a>

                <div x-show="open" x-cloak x-transition class="absolute flex flex-col w-64 p-4 mt-4 bg-white border-4 border-red-700 -right-28 -top-40">
                    <p class="p-2 mb-6 text-lg text-center bg-gray-200">
                        Are you sure? this can't be undone.
                    </p>

                    <div class="p-2 mb-4 text-center underline cursor-pointer">
                        Nevermind, go back
                    </div>

                    <form @click.outside="open = false" action="/delete/{{ $post->id }}" method="post" class="p-2 border-2 border-red-700">
                        @csrf

                        @method('delete')

                        <button type="submit" class="p-2 font-bold text-red-700 transition-colors hover:bg-red-700 hover:text-white">
                            Yes I'm sure, Delete my post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
