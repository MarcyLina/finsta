@foreach ($post->comments as $comment )
    <li class="px-4 pt-2 mb-2 border-2 border-black" x-cloak x-data="{open: false}">
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
            <form action="{{ route('reply.store', [$post->id, $comment->id] ) }}"  method="POST" x-show="open" @click.outside="open = false">
                @csrf

                <div class="flex mb-4">
                    <input
                        id="reply"
                        name="reply"
                        type="textarea"
                        name="reply"
                        class="w-full p-2 mr-2 border border-black"
                        placeholder="Add a reply"
                        value="{{'@' . $comment->user->username }} "
                        autofocus
                    />

                    <button type="submit" class="block p-1 transition cursor-pointer border border-black hover:bg-[#ffbc00]">
                        Submit
                    </button>
                </div>

                @error('reply')
                    <div class="p-2 ml-4 font-bold text-red-600 border-2 border-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </form>
        </div>

        <ul class="overflow-y-auto text-sm font-bold bg-white replies max-h-36">
            @foreach ($comment->replies as $reply )
                <li class="mb-2.5 p-2.5 border border-gray-400">
                    @include('partials.avatar', [$user = $reply->user, 'class' => 'h-4 w-4 inline'])

                    <a href="{{ route('profile.show', $comment->user_id) }}" class="mr-1 font-bold">
                        {{ $reply->user->username }}
                    </a>

                    <span class="font-normal">
                        {{ $reply->reply }}
                    </span>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach

