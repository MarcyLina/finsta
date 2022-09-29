<nav class="fixed top-0 left-0 w-full p-4 bg-white border-b">
    <div class="grid grid-cols-3 items-center max-w-[1300px] mx-auto">
        <a href="{{ route('posts.index') }}">
            <img src="{{ asset('/images/tinsta.webp') }}" alt="tinstagram logo" class="w-1/3 h-auto">
        </a>

        <input type="text" name="search" id="search" placeholder="Search" class="justify-self-start">

        @if (auth()->user())
            <div class="flex">
                <p>
                    Hi {{ Auth::user()->name }}!
                </p>

                <a href="{{ route('post.create') }}" class="mx-6">Create a new post</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a
                        :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                    >
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        @else
            <div>
                <a href="{{ route('login') }}">Log In</a>
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Need to register?') }}
                </a>
            </div>
        @endif
    </div>
</nav>
