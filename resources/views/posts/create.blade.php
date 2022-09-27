<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('create') }}
        </h2>
    </x-slot>

    <form action="">
        @csrf
    </form>
</x-app-layout>
