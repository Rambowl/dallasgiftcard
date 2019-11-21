<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase pr-6">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-center h-full">
            <img src="{{ asset('images/logo.png') }}" width="600" height="60">
            <div class="mt-2">          
                <ul class="flex items-center justify-between">
                    <li class="inline pr-8">
                        <a href="#" class="no-underline hover:underline text-lg font-normal text-gray-600 uppercase" title="Purchase giftcards">Purchase Giftcards</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="#" class="no-underline hover:underline text-lg font-normal text-gray-600 uppercase" title="Sell giftcards">Sell Giftcards</a>
                    </li>
                    <li class="inline">
                        <a href="#" class="no-underline hover:underline text-lg font-normal text-gray-600 uppercase" title="Marketing and strategy">Marketing and Strategy</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
