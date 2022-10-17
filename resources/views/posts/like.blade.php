<div class="block">
    @can('like', $model)
        <form action="{{ route('like') }}" method="POST">
            @csrf
            <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
            <input type="hidden" name="id" value="{{ $model->id }}"/>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
        </form>
    @endcan

    @can('unlike', $model)
        <form action="{{ route('unlike') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
            <input type="hidden" name="id" value="{{ $model->id }}"/>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
        </form>
    @endcan

    <p class="mb-1 text-gray-500">
        {{ trans_choice(':count like|[2,*] :count likes', count($model->likes), ['count' => count($model->likes)]) }}
    </p>
</div>

