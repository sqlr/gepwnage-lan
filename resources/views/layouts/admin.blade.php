<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.components.head')

</head>
<body>

<div id="app">
    <nav class="navbar navbar-dark navbar-expand-md">
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
                            <a href="{{ route('information.pricing') }}"
                               class="dropdown-item {{ request()->is('information/pricing') ? 'active' : '' }}">
                                Pricing
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    @auth
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
                                    <a class="dropdown-item" href="{{ route('admin.home') }}" target="_blank">
                                        Admin Panel
                                    </a>
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
                            <a href="{{ route('register') }}"
                               class="nav-link text-gepwnage-secondary {{ request()->is('register') ? 'active' : '' }}">
                                Register
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
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
