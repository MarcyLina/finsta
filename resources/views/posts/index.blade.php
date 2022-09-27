<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('post index') }}
        </h2>
    </x-slot>

    @if ($posts)
        @foreach ($posts as $post )
            <p>
                {{ $post->caption }}
            </p>

            <a href="{{ route('post.show', $post->id) }}">
                <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-96 w-96">
            </a>
        @endforeach
    @endif

    <div class="p-8">
        {{ $posts->links() }}
    </div>
</x-app-layout>
