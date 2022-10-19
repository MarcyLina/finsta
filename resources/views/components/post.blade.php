@props(['hideButton' => false, 'showComments' => false, 'post' => $post, 'comments' => null])

<div {{ $attributes->merge(['class' => 'block py-3 mx-auto my-6 bg-white border shadow-md w-[450px]']) }}
>
    <div class="main-post">
        <div class="flex items-center justify-between px-4 mb-2 font-bold">
            <a href="{{ route('profile.show', $post->user_id) }}">
                {{ $post->user->username }}
            </a>

            @include('partials.avatar', [$user = $post->user, 'class' => 'h-12 w-12'])
        </div>
        {{-- @dd($post->comment) --}}
        <a href="{{ route('post.show', $post->id) }}">
            <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-[450px] my-3 w-[450px]">
        </a>
    </div>

    @include('posts.meta')
</div>
