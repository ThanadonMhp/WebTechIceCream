<nav class="bg-light-purple border-gray-200 py-4 text-xl">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="{{ url('/userprofile') }}" class="flex items-center">
            <!--Logo Icon-->
            <img src="/images/ice-cream.png" class="h-6 mr-3 sm:h-9" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap"><strong>My Profile</strong></span>
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
                    <a href="{{ url('/events') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Events</strong>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/createevent') }}"
                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">
                        <strong>Create Event</strong>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
