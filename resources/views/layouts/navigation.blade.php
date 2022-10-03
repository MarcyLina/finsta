<nav class="fixed top-0 left-0 w-full bg-white border-b">
    <div class="grid grid-cols-3 items-center max-w-[1300px] mx-auto">
        <x-application-logo class="mx-0" />

        <input type="text" name="search" id="search" placeholder="Search">

        @if (auth()->user())
            <div
                x-data="{open: false}"
                class="relative justify-self-end"
            >
                <button
                    @click="open = true"
                    class="flex items-baseline border-none rounded-full"
                >
                    <img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ" alt="" class="object-cover w-16 h-16 bg-blue-300 rounded-full">

                    <svg
                        :class="open ? 'rotate-180' : ''"
                        class="w-6 h-6 ml-3 transition ease-in-out"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div
                    x-cloak
                    x-transition
                    x-show="open"
                    @click.outside="open = false"
                    class="absolute w-48 p-4 mt-2 bg-white border"
                >
                    <p class="mb-6 font-bold">
                        Hi {{ Auth::user()->name }}!
                    </p>

                    <a href="{{ route('post.create') }}" class="block mb-6">Create a new post</a>

                    <a href="#" class="block mb-6">View my profile</a>

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
            </div>

        @else
            <div class="text-right">
                <a href="{{ route('login') }}">Log In</a>
                <a class="ml-4" href="{{ route('register') }}">
                    {{ __('Need to register?') }}
                </a>
            </div>
        @endif
    </div>
</nav>
