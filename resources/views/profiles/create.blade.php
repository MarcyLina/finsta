<x-app-layout>
    <h1 class="my-8 text-2xl text-center">Tell everyone a little about yourself!</h1>
    <div class="max-w-2xl p-8 mx-auto">
        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Edit Title')" />

                <x-text-input
                    id="title"
                    name="title"
                    class="block w-full mt-1 mb-4"
                    type="text" name="title"
                    :value="old('title')"
                    autofocus
                />

                <x-input-label for="bio" :value="__('Edit Bio')" />

                <textarea
                    id="bio"
                    name="bio"
                    class="block w-full mt-1 mb-4"
                    type="text" name="bio"
                    :value="old('bio')"
                ></textarea>

                <x-input-label for="url" :value="__('Edit URL')" />

                <x-text-input
                    id="url"
                    name="url"
                    class="block w-full mt-1 mb-4"
                    type="text" name="url"
                    :value="old('url')"
                />
            </div>

            <button class="p-2 border border-black" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>
