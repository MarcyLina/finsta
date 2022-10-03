<x-app-layout>
    <x-post :post="$post" />

    @if ($post->user_id === auth()->id())
        <div class="flex justify-center">
            <a href="/p/{{ $post->id }}/edit" class="mr-8 hover:underline">
                Edit this post
            </a>

            <form action="/delete/{{ $post->id }}" method="post">
                @csrf
                @method('delete')

                <button type="submit" class="font-bold text-red-800 hover:underline">
                    Delete this post
                </button>
            </form>
        </div>
    @endif
</x-app-layout>
