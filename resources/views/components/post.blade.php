<div {{ $attributes->merge(['class' => 'block py-3 mx-auto my-6 bg-white border shadow-md w-[450px]']) }}
>
    <div class="flex items-center justify-between px-4 mb-2 font-bold">
        <a href="{{ route('profile.show', $post->user_id) }}">
            {{ $post->user->username }}
        </a>

        @include('partials.avatar', [$user = $post->user, 'class' => 'h-12 w-12'])
    </div>

    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-[450px] my-3 w-[450px]">
    </a>

    <div class="px-4">
        <div class="flex items-start gap-x-2">
            @include('posts.like', ['model' => $post])

            @include('posts.comment')

            @include('posts.share')
        </div>

        <p x-data="{expanded: false}">
            <a href="{{ route('profile.show', $post->user_id) }}" class="font-extrabold">
                {{ $post->user->username }}
            </a>
            <span x-cloak class="block mt-2 text-gray-600" :class="expanded ? 'line-clamp-0' : 'line-clamp-1'">
                {{ $post->caption }}
            </span>

            @if (strlen($post->caption) > 100 )
                <button class="text-xs text-gray-500 underline uppercase" @click="expanded = true" :class="expanded ? 'hidden' : 'font-bold'">Read More</button>
            @endif
        </p>

        <p class="mt-3 text-xs font-bold uppercase">
            {{ date('F d, Y', strtotime($post->created_at)) }}
        </p>
    </div>
</div>
