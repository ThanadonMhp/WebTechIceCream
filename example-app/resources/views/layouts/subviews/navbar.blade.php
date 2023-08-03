<nav class="bg-light-purple border-gray-200 py-4 text-xl">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="#" class="flex items-center">
            <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap"><strong>IceCream</strong></span>
        </a>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ url('/myevent') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>My Events</strong>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/allmain') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Events</strong>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Create Event</strong>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
