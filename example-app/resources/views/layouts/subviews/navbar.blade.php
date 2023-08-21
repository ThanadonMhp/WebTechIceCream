<nav class="bg-light-purple border-gray-200 py-4 text-xl antialiased">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="{{ url('/') }}">
            <img src="/images/ice-cream.png" class="h-6 mr-3 sm:h-9" alt="Logo">
        </a>

        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-0" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                    <a href="{{ route('events.index') }}"
                       class="nav-menu {{ Route::currentRouteName() === 'events.index' ? 'active' : '' }}">
                        <strong>Events</strong>
                    </a>
                </li>

                @if (Auth::check())
                    @if (Auth::user()->isAdmin())
                        <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <a href="{{ route('events.pending') }}"
                            class="nav-menu {{ Route::currentRouteName() === 'events.pending' ? 'active' : '' }}">
                                <strong>Pending Events</strong>
                            </a>
                        </li>                        
                    @else
                        <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <a href="{{ route('events.myevents') }}"
                            class="nav-menu {{ Route::currentRouteName() === 'events.myevents' ? 'active' : '' }}">
                                <strong>My Events</strong>
                            </a>
                        </li>
                        <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <a href="{{ route('events.create') }}"
                            class="nav-menu {{ Route::currentRouteName() === 'events.create' ? 'active' : '' }}">
                                <strong>Create Event</strong>
                            </a>
                        </li>
                    @endif
                    
                @endif
                
            </ul>
        </div>

        @if( Auth::check() )
        <div class="flex items-center">
            <div class="mr-4">
                <a href="{{ route('users.show', ['user' => Auth::user() ]) }}">
                    {{ Auth::user()->name }}
                </a>
            </div>
            <div class="text-gray-800 bg-indigo-100 hover:bg-indigo-200 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm ">
                <form action="{{ route('logout') }}"method='POST'>
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        @else
        <div class="flex items-center">
            <div class="text-gray-800 mr-2 bg-indigo-100 hover:bg-indigo-200 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm">
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>
            <div class="text-gray-800 bg-indigo-100 hover:bg-indigo-200 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm">
                <a href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </div>
        @endif

    </div>
</nav>
