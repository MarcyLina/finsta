<div class="px-4">
    <div class="flex items-start">
        @include('posts.like', ['model' => $post])

        @include('posts.view-comments')

        {{-- @include('posts.share') --}}
    </div>

    <article x-data="{expanded: false}">
        <div class="flex">
            <a href="{{ route('profile.show', $post->user_id) }}" class="mr-2 font-bold">
                {{ $post->user->username }}
            </a>

            <span x-cloak class="block text-gray-600" :class="expanded ? 'line-clamp-0' : 'line-clamp-1'">
                {{ $post->caption }}
            </span>
        </div>

        @if (strlen($post->caption) > 39 )
            <button class="text-xs text-gray-500 underline uppercase" @click="expanded = true" :class="expanded ? 'hidden' : 'font-bold'">
                Read More
            </button>
        @endif

        @if (! $hideButton)
            <a class="block mt-2 text-xs text-gray-500 underline uppercase" href="{{ route('post.show', $post->id) }}">
                View all 42 comments
            </a>
        @endif
    </article>

    @if ($showComments)
        @include('posts.comment')
    @endif

    <p class="mt-3 text-xs font-bold uppercase">
        {{ date('F d, Y', strtotime($post->created_at)) }}
    </p>
</div>
