<x-app-layout>
<div class="max-w-2xl p-8 mx-auto">
    {{-- <a href="{{ route('post.show', $post->id) }}">Back to the post</a> --}}
    <form method="POST" action="/update/{{ $post->id }}" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div>
            <x-input-label for="caption" :value="__('Edit Caption')" />

            <x-text-input
                id="caption"
                name="caption"
                class="block w-full mt-1"
                type="text" name="caption"
                :value="$post->caption"
                autofocus
            />

            @error('caption')
                <div class="font-bold text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="my-8">
            <x-input-label for="caption" :value="__('Change Image')" />

            <input type="file"  name="image" id="image" :value="$post->image" />

            @error('image')
                <div class="font-bold text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <img class="w-48 mb-6 mr-6" src="{{ asset($post->image) }}" alt="" />

            @error('image')
            <p class="mt-1 text-red-500">
                {{ $message }}
            </p>
            @enderror

        <button type="submit" class="p-2 border border-black">Update</button>
    </form>
</div>
</x-app-layout>
