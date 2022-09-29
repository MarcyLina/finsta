<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('post index') }}
        </h2>
    </x-slot>

    @if ($posts)
        @foreach ($posts as $post )
            <p>
                caption: {{ $post->caption }}
            </p>

            <p>
                post id: {{ $post->id }}
            </p>

            <p class="font-bold">
                user name {{ $post->user->name }}
            </p>

            <p>
                date posted: {{ $post->created_at }}
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
