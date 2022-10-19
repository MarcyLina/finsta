@foreach ($comments as $comment )
    <article class="flex my-5">
            @include('partials.avatar', [$user = $post->user, 'class' => 'h-7 w-7'])

            <a href="#" class="mx-2 font-bold">
                {{ $comment->username }}
            </a>

        <span class="text-gray-600">
            {{ $comment->comment }}
        </span>
    </article>
@endforeach
