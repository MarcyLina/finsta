<a href="{{ route('post.show', $post->id) }}" class="block p-5 my-6 bg-white border w-[35vw] mx-auto shadow-md">
    <p class="mb-2 font-bold">
        {{ $post->user->username }}
    </p>

    <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover mb-3 border h-96 w-96">

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
