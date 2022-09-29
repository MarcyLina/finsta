<x-app-layout>
    @if ($posts)
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    @endif

    <div class="p-8">
        {{ $posts->links() }}
    </div>
</x-app-layout>
