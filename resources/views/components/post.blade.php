<p>
    caption: {{ $post->caption }}
</p>

<p>
    post id: {{ $post->id }}
</p>

<p class="font-bold">
    user name: {{ $post->user->name }}
</p>

<p>
    date/time posted: {{ $post->created_at }}
</p>

<a href="{{ route('post.show', $post->id) }}">
    <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-96 w-96">
</a>
