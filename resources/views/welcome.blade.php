@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="flex items-center justify-center">
        <div class="flex flex-col justify-center items-center w-full">
            
            <div class="px-6 py-4 w-2/3">          
                <ul class="flex items-center justify-between sm:text-lg md:text-xl font-normal">
                    <li class="inline pr-8">
                        <a href="#" class="no-underline hover:underline font-normal text-gray-600 uppercase" title="Purchase giftcards">Purchase Giftcards</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="#" class="no-underline hover:underline font-normal text-gray-600 uppercase" title="Sell giftcards">Sell Giftcards</a>
                    </li>
                    <li class="inline">
                        <a href="#" class="no-underline hover:underline font-normal text-gray-600 uppercase" title="Marketing and strategy">Marketing and Strategy</a>
                    </li>                    
                </ul>
            </div>
            {{-- <img src="{{ asset('images/student_desk.jpg') }}" class="w-2/3"> --}}
        </div>
    </div>
</div>
@endsection
