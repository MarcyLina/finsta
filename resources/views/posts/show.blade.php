<x-app-layout>
    <x-post :post="$post" />

    @if (auth()->user())
        <a href="/p/{{ $post->id }}/edit" class="px-16 py-8 bg-white border border-black">edit?</a>

        <form action="/delete/{{ $post->id }}" method="post">
            @csrf

            @method('delete')

            <button type="submit" class="px-16 py-8 mt-12 bg-white border border-red-500">delete?</button>
        </form>
    @endif
</x-app-layout>
