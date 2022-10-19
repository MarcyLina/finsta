<x-post :post="$post" :comments="$comments" class="grid w-1/2 grid-cols-2 pl-6" hideButton showComments />

<form method="POST" action="{{ route('comment.store') }}" class="flex items-center justify-center mb-8">
    @csrf

    <textarea
        id="comment"
        name="comment"
        type="textarea"
        name="comment"
        class="w-1/3 mr-4"
        placeholder="Add a Comment"
        autofocus
    ></textarea>

    <button type="submit" class="px-4 py-2 border border-black transition hover:bg-[#ffbc00]">
        Add Comment
    </button>

    @error('comment')
        <div class="p-2 ml-4 font-bold text-red-600 border-2 border-red-600">
            {{ $message }}
        </div>
    @enderror
</form>