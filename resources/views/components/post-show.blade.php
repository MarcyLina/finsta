<x-post :post="$post" :comments="$comments" class="grid w-1/2 grid-cols-2 pl-6" hideButton showComments />

<form method="POST" action="#" class="flex justify-center mb-8">
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

    <button type="submit" class="px-2 border border-black transition hover:bg-[#ffbc00]">
        Add Comment
    </button>
</form>
