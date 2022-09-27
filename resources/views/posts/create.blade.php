<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('create') }}
        </h2>
    </x-slot>

    <form action="{{ route('post.store') }}" method="POST" class="flex flex-col max-w-xl mx-auto mt-12" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="enter caption" name="caption">
        {{-- <input type="file" name="image_url" class="my-8"> --}}
        <button type="submit" name="submit" class="border border-black ">
            submit
        </button>
    </form>
</x-app-layout>
