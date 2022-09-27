<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('single post show') }}
        </h2>
    </x-slot>

    <p>
        {{ $post->caption }}
    </p>

    <img src="{{ $post->image }}" alt="">
</x-app-layout>
