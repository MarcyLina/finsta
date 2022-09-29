<x-app-layout>
    <div class="max-w-2xl p-8 mx-auto">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="caption" :value="__('Caption')" />

                <x-text-input
                    id="caption"
                    name="caption"
                    class="block w-full mt-1"
                    type="text" name="caption"
                    :value="old('caption')"
                    autofocus
                />

                @error('caption')
                    <div class="font-bold text-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="my-8">
                <x-input-label for="caption" :value="__('Add Image')" />

                <input type="file"  name="image" id="image" />

                @error('image')
                    <div class="font-bold text-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="p-2 border border-black" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>
