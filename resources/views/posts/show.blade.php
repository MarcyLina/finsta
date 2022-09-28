<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('single post show') }}
        </h2>
    </x-slot>

    <p>
        {{ $post->caption }}
    </p>

    <img src="{{ asset( $post->image) }}" alt="">

    @if (auth()->user())
        <a href="/p/{{ $post->id }}/edit" class="px-16 py-8 bg-white border border-black">edit?</a>
    @endif
</x-app-layout>
