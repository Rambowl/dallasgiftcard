@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center">

        <!-- navigation -->
        <div class="bg-gray-400 w-1/2">
            <ul class="flex items-center justify-between underline mb-5 text-4xl py-2 px-4">
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="/campaigns">Campaigns</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="#">Customers</a>
                </li>
                <li>
                    <a class="text-blue-500 hover:text-blue-800" href="#">Redeem</a>
                </li>
            </ul>
        </div>
        <div class="md:w-1/2 md:mx-auto mt-4">
            <div class="text-2xl text-gray-600 border border-gray-400 rounded p-4">
                Campaign Data
                <div class="text-black text-lg mt-4 ml-4">
                    Testing
                </div>
            </div>
            {{--@if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif--}}

            <!-- <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Dashboard
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        You are logged in!
                    </p>
                </div>
            </div> -->
        </div>
    </div>
@endsection
