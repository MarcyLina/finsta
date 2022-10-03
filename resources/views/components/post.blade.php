<a href="{{ route('post.show', $post->id) }}" class="block px-5 py-3 mx-auto my-6 bg-white border shadow-md w-[450px]">
    <div class="flex items-center justify-between mb-2 font-bold">
        {{ $post->user->username }}

        <img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ" alt="" class="object-cover w-12 h-12 bg-blue-300 rounded-full">
    </div>

    <img src="{{ asset( $post->image) }}" alt="{{ $post->caption }}" class="object-cover h-[450px] my-3 w-[450px]">

    <div class="todo-delete-me">
        {{ $post->user_id }}
    </div>

    <p>
        <span class="font-bold">
            {{ $post->user->username }}
        </span>
        <span class="text-gray-500">
            {{ $post->caption }}
        </span>
    </p>

    <p class="mt-3 text-xs font-bold">
        {{ date('M d, Y', strtotime($post->created_at)) }}
    </p>
</a>
