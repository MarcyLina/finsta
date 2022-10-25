@foreach ($post->comments as $comment )
    <article>
        <div class="flex p-2 my-6">
            @include('partials.avatar', [$user = $comment->user, 'class' => 'h-7 w-7'])

            <a href="{{ route('profile.show', $comment->user_id) }}" class="mx-2 font-bold">
                {{ $comment->user->username }}
            </a>

            <span class="text-gray-800">
                {{ $comment->copy }}
            </span>
        </div>

        <div x-cloak x-data="{open: false}">
            <button @click="open = true" class="p-2 bg-pink-400 border border-black">
                Add reply
            </button>

            <form action="/{{ $post->id }}/{{ $comment->id }}/reply-store"  method="POST" x-show="open">
                @csrf

                <input
                    id="reply"
                    name="reply"
                    type="textarea"
                    name="reply"
                    class="w-1/3 p-2 mr-4 border border-black"
                    placeholder="Add a reply"
                    autofocus
                />

                <button type="submit" class="p-2 bg-blue-400 border border-black">
                    Add reply
                </button>

                @error('reply')
                    <div class="p-2 ml-4 font-bold text-red-600 border-2 border-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </form>
        </div>

        <div class="text-sm font-bold text-green-700">HI REPLIES LIVE HERE
            {{-- @foreach ($comment->replies as $reply )
                {{ $reply->reply }}
            @endforeach --}}
        </div>
    </article>
@endforeach

