@foreach ($post->comments as $comment )
    <li class="px-4 py-2 mb-2 border-2 border-black" x-cloak x-data="{open: false}">
        <div class="mt-6 mb-2 comment">
            @include('partials.avatar', [$user = $comment->user, 'class' => 'h-7 w-7 inline'])

            <a href="{{ route('profile.show', $comment->user_id) }}" class="mx-2 font-bold">
                {{ $comment->user->username }}
            </a>

            <span class="text-gray-800">
                {{ $comment->copy }}
            </span><br>

            <button @click="open = true" class="my-4 underline show-form">
                Reply to this comment
            </button>
        </div>

        <div>
            <form action="#"  method="POST" x-show="open" @click.outside="open = false">
                @csrf

                <div class="flex">
                    <input
                        id="comment-on-comment"
                        name="comment-on-comment"
                        type="textarea"
                        name="comment-on-comment"
                        class="w-1/3 p-2 mr-2 border border-black"
                        placeholder="Add a comment-on-comment"
                        autofocus
                    />

                    <button type="submit" class="block p-1 transition cursor-pointer border border-black hover:bg-[#ffbc00]">
                        Submit comment-on-comment
                    </button>
                </div>

                @error('comment-on-comment')
                    <div class="p-2 ml-4 font-bold text-red-600 border-2 border-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </form>
        </div>
    </li>
@endforeach

