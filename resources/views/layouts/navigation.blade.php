<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Left Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
        <style>
    /* Custom CSS for the hover dropdown menu */
    .hover-dropdown {
        position: relative;
        width: 200px;
    }

    .hover-dropdown .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #202020; /* Dark background color */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        padding: 10px;
        z-index: 1;
        font-size: 16px; /* Font size for links */
        font-weight: bold; /* Optionally, set font weight as bold */
        color: #ffffff; /* Text color for links */
    }

    .hover-dropdown .dropdown-content a {
        display: block;
        padding: 8px 10px;
        text-decoration: none;
        color: #ffffff;
    }

    .hover-dropdown .dropdown-content a:hover {
        background-color: #C0C0C0; /* Background color for links on hover */
    }

    .hover-dropdown:hover .dropdown-content {
        display: block;
    }
    .hover-dropdown .dropdown-content a {
        text-decoration: none;
    }
</style>

<div class="flex hover-dropdown">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}">
            <img src="https://d2jyir0m79gs60.cloudfront.net/college/logos/Houston_Baptist_University.png" 
                class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>
    <!-- Navigation Links -->
    <div class="dropdown-content space-x-10 sm:-my-px sm:mr-5 sm:flex">
        <x-nav-link :href="route('dashboard')">
            {{ __('Admin Panel') }}
        </x-nav-link>
        <x-nav-link :href="route('users.index')">
            {{ __('Korisnici') }}
        </x-nav-link>
        <x-nav-link :href="route('users.index')">
            {{ __('Uloge') }}
        </x-nav-link>
        <x-nav-link :href="route('about')">
            {{ __('O nama') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')">
            {{ __('Ponuda utovara') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')">
            {{ __('Unesi utovar') }}
        </x-nav-link>
        <x-nav-link :href="route('dashboard')">
            {{ __('Unesi pošiljku') }}
        </x-nav-link>
        </div>
    </div>
            <!-- Centered Search Bar -->
            <div class="col-md-5 mx-auto mt-3">
                <div class="row justify-content-center">
                    <div class="col-lg-6"> 
                        <form action="search.php" method="GET" class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search..." style="border-radius: 10px;">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a href="#">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                    class="block h-9 w-auto fill-current text-gray-800" />
                </a>&nbsp;&nbsp;
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1"   >
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Left hidden navigation menu -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
