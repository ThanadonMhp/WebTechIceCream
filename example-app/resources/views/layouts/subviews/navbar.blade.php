<nav class="bg-light-purple border-gray-200 py-4 text-xl">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <img src="/images/ice-cream.png" class="h-6 mr-3 sm:h-9" alt="Logo">

        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-0" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('events.index') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Events</strong>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/myevent') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>My Events</strong>
                    </a>
                </li>
                <li>
                    <a href="{{ route('events.create') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Create Event</strong>
                    </a>
                </li>
            </ul>
        </div>

        @if( Auth::check() )
        <div class="flex items-center">
            <div class="mr-4">
                {{ Auth::user()->name }}
            </div>
            <div>
                <form action="{{ route('logout') }}" method='POST'>
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        @else
        <div class="flex items-center">
            <div class="mr-4">
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>
            <div>
                <a href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </div>
        @endif

    </div>
</nav>
