<img
    src="
        @if ($user->profile)
            @if ($user->profile->image)
                {{ asset($user->profile->image) }}
            @endif
        @else
            https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ
        @endif
    "
    alt="user avatar"
    class="object-cover rounded-full shadow-md border border-gray-300 {{ $class ?? '' }}"
>
