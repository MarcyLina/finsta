<x-app-layout>
    <div class="max-w-2xl p-8 mx-auto">
        <form method="POST" action="/update/{{ $profile->id }}" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div>
                <x-input-label for="title" :value="__('Edit Title')" />

                <x-text-input
                    id="title"
                    name="title"
                    class="block w-full mt-1 mb-4"
                    type="text" name="title"
                    :value="$profile->title"
                    autofocus
                />

                <x-input-label for="bio" :value="__('Edit Bio')" />

                <textarea
                    id="bio"
                    name="bio"
                    class="block w-full mt-1 mb-4"
                    type="text" name="bio"
                    :value="$profile->bio"
                ></textarea>

                <x-input-label for="url" :value="__('Edit URL')" />

                <x-text-input
                    id="url"
                    name="url"
                    class="block w-full mt-1 mb-4"
                    type="text" name="url"
                    :value="$profile->url"
                    autofocus
                />

                @error('caption')
                    <div class="font-bold text-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </div>
{{--
            <div class="my-8">
                <x-input-label for="caption" :value="__('Change Avatar')" />

                <input type="file"  name="avatar" id="avatar" :value="$profile->avatar" />

                @error('avatar')
                    <div class="font-bold text-red-600">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            {{-- <img class="w-48 mb-6 mr-6" src="{{ asset($profile->avatar) }}" alt="" /> --}}
{{--
                @error('image')
                    <p class="mt-1 text-red-500">
                        {{ $message }}
                    </p>
                @enderror --}}

            <button type="submit" class="p-2 border border-black">Update</button>
        </form>
    </div>
    </x-app-layout>