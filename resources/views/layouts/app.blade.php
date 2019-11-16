<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-blue-700 shadow mb-8 py-4">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="lg:flex items-center mr-6">
                        {{-- if it is a guest, go back to the original homepage --}}
                        @guest
                            <a href="{{ url('/') }}" class="no-underline">
                                <img src="{{ asset('images/logo.png') }}" width="250" height="29">
                            </a>
                        {{-- else it is not a guest; go to logged in homepage --}}
                        @else                            
                            <a href="{{ url('/home') }}" class="flex content-center no-underline">
                                <img src="{{ asset('images/logo.png') }}" width="250" height="29">
                            </a>

                            <!-- navigation -->
                            <ul class="flex items-center underline text-xl py-2 px-10">
                                <li class="mr-10">
                                    <a class="text-blue-400 hover:text-blue-800" href="/campaigns">CAMPAIGNS</a>
                                </li>
                                <li class="mr-10">
                                    <a class="text-blue-400 hover:text-blue-800" href="#">CUSTOMERS</a>
                                </li>
                                <li>
                                    <a class="text-blue-400 hover:text-blue-800" href="#">REDEEM</a>
                                </li>
                            </ul>
                                                            
                        @endguest
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline hover:underline text-gray-300 text-base p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-300 text-base p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-300 text-base pr-4">Welcome, {{ ucfirst(Auth::user()->name) }}</span>

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline text-gray-300 text-base p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
