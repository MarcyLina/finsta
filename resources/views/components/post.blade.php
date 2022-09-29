<a href="{{ route('post.show', $post->id) }}" class="block p-5 mx-auto my-6 bg-white border shadow-md w-[450px]">
    <p class="mb-2 font-bold">
        {{ $post->user->username }}
    </p>

    <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-[450px] mb-3 w-[450px]">

    <p>
        <span class="font-bold">
            {{ $post->user->username }}
        </span>
        {{ $post->caption }}
    </p>

    <p>
        date/time posted: {{ $post->created_at }}
    </p>
</a>
