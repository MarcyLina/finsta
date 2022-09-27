<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('post index') }}
        </h2>
    </x-slot>

    all
    @foreach ($posts as $post )
        <p>
            {{ $post->caption }}
        </p>

        <a href="{{ route('post.show', $post->id) }}">
            <img src="{{ $post->image_url }}" alt="">
        </a>
    @endforeach
</x-app-layout>
