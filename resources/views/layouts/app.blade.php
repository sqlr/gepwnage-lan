<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.components.head')

</head>
<body>

<div id="app">
    <nav class="navbar navbar-dark navbar-expand-md navbar-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo_30x21.png') }}" alt="{{ config('app.name') }}"/>
            </a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="{{ route('home') }}"
                           class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <div role="button"
                             class="nav-link dropdown-toggle {{ request()->is('information/*') ? 'active' : '' }}"
                             style="cursor: pointer;"
                             data-toggle="dropdown">
                            Information
                            <span class="caret"></span>
                        </div>
                        <div class="dropdown-menu">
                            <a href="{{ route('information.location') }}"
                               class="dropdown-item {{ request()->is('information/location') ? 'active' : '' }}">
                                Location &amp; Route
                            </a>
                            <a href="{{ route('information.packing-list') }}"
                               class="dropdown-item {{ request()->is('information/packing-list') ? 'active' : '' }}">
                                Packing List
                            </a>
                            <a href="{{ route('information.pricing') }}"
                               class="dropdown-item {{ request()->is('information/pricing') ? 'active' : '' }}">
                                Pricing
                            </a>
                        <!--
                            <a href="{{ route('information.schedule') }}"
                               class="dropdown-item {{ request()->is('information/schedule') ? 'active' : '' }}">
                                Schedule
                            </a>
                            <a href="{{ route('information.visitors') }}"
                               class="dropdown-item {{ request()->is('information/visitors') ? 'active' : '' }}">
                                Visitors
                            </a>
                            -->
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="px-md-3">
                            @if(auth()->user()->orders_count > 0)
                                <a href="{{ route('orders') }}"
                                   class="nav-link {{ request()->is('orders') ? 'active' : '' }}">
                                    My Tickets
                                </a>
                            @else
                                <a href="{{ route('tickets') }}"
                                   class="nav-link text-gepwnage-secondary {{ request()->is('tickets') ? 'active' : '' }}">
                                    Tickets
                                </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <div role="button"
                                 class="nav-link dropdown-toggle"
                                 style="cursor: pointer;"
                                 data-toggle="dropdown">
                                {{ auth()->user()->name }}
                                <span class="caret"></span>
                            </div>

                            <div class="dropdown-menu">
                                @if(auth()->user()->roles->contains('admin'))
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">
                                        Admin Panel
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" method="POST"
                                      id="logout-form" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="px-md-3">
                            <a href="{{ route('tickets') }}"
                               class="nav-link text-gepwnage-secondary {{ request()->is('tickets') ? 'active' : '' }}">
                                Tickets
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <div role="button"
                                 class="nav-link dropdown-toggle"
                                 style="cursor: pointer;"
                                 data-toggle="dropdown">
                                Login
                                <span class="caret"></span>
                            </div>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Login
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('gewis.login') }}">
                                    <span class="text-gewis">GEWIS</span> Login
                                </a>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header>
        @yield('header')
    </header>

    <main class="py-4">
        <div class="container">
            @include('layouts.components.alerts')
        </div>

        @yield('content')
    </main>

    <footer class="mt-5 py-5 bg-dark text-light">
        @include('layouts.components.footer')
    </footer>
</div>

</body>
</html>
