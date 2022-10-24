@foreach ($post->comments as $comment )
    <article class="flex p-2 my-6">
            @include('partials.avatar', [$user = $comment->user, 'class' => 'h-7 w-7'])

            <a href="{{ route('profile.show', $comment->user_id) }}" class="mx-2 font-bold">
                {{ $comment->user->username }}
            </a>

        <span class="text-gray-800">
            {{ $comment->copy }}
        </span>
    </article>
@endforeach

