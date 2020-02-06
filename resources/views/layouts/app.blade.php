<!doctype html>
<html lang="{{ app()->getLocale() }}" height="100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/dist/dropzone.css">
    <script src="/dist/dropzone.js"></script>

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="sweetalert2.min.css">  --}}  
</head>
<body class="flex flex-col bg-gray-400 min-h-screen antialiased leading-none">
    <div id="app" class="flex flex-col flex-grow">
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
                                    <a class="text-blue-400 hover:text-blue-800" href="#">MAILING LISTS</a>
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
                        <dropdown align="right" width="200px">
                            <template v-slot:trigger>
                                <span class="text-gray-300 text-base pr-4">Welcome, {{ ucfirst(Auth::user()->first_name) . ' ' . ucfirst(Auth::user()->last_name) }}</span>
                            </template>
                            <a href="#" class="block text-base px-4 py-2 hover:text-white hover:bg-blue-800">My Account</a>
                            <a href="{{ url('/businesses')}}" class="block text-base px-4 py-2 hover:text-white hover:bg-blue-800">My Businesses</a>
                            
                            <a href="{{ route('logout') }}"
                               class="block text-base px-4 py-2 hover:text-white hover:bg-blue-800"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </dropdown>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
        
    </div> 

    <footer id="footer" class="relative bottom-0 w-full">
        <div class="flex justify-end bg-blue-500 mt-10 p-10">
            <support-button></support-button>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <script>
        Dropzone.options.logoDropzone =
        {
            maxFilesize: 3,
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            maxFiles: 1,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);

                return window.location.replace("../../../businesses");
            },
            error: function(file, response)
            {
                if (file.size >= 3*1024*1024) {
                 alert("File was Larger than 3Mb!");
                }
                console.log(file.size);
               return false;
            }
        };

        Dropzone.options.newsletterDropzone =
        {
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            maxFiles: 1,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);

                return window.location.replace("../../../businesses");
            },
            error: function(file, response)
            {
                if (file.size >= 5*1024*1024) {
                 alert("File was Larger than 5Mb!");
                }
                console.log(file.size);
               return false;
            }
        };
    </script>

</body>
</html>