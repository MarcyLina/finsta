<nav class="fixed top-0 left-0 flex items-center justify-between w-full p-4 bg-white border-b">
    <a href="{{ route('posts.index') }}">Tinstagram</a>

    <input type="text" name="search" id="search" placeholder="Search">

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
</nav>
