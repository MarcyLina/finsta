<div {{ $attributes->merge(['class' => 'block px-5 py-3 mx-auto my-6 bg-white border shadow-md w-[450px]']) }}
>
    <div class="flex items-center justify-between mb-2 font-bold">
        <a href="{{ route('profile.show', $post->user_id) }}">
            {{ $post->user->username }}
        </a>

        <img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ" alt="" class="object-cover w-12 h-12 bg-blue-300 rounded-full">
    </div>

    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-[450px] my-3 w-[450px]">
    </a>

    <p>
        <a href="href="{{ route('profile.show', auth()->user()->id) }}" class="font-bold">
            {{ $post->user->username }}
        </a>
        <span class="text-gray-500">
            {{ $post->caption }}
        </span>
    </p>

    <p class="mt-3 text-xs font-bold">
        {{ date('M d, Y', strtotime($post->created_at)) }}
    </p>
</div>
