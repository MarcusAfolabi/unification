@extends('layouts.main')
@section('title', 'All Institution')
@section('description', 'This is all the institutions of Unification Campus Fellowship')
@section('keywords', 'school, campus, schooling, student')
@section('canonical', 'https://cnsunification.org/institutions')

@section('main')

<div class="main_content">
    <div class="mcontainer">

        <div class="my-6 flex items-center justify-between border-b pb-3">
            <div>
                <h2 class="text-xl font-semibold"> All Chapters  </h2>
                <p class="font-medium text-blue-500 leading-6"> Find your chapter location and contact </p>
            </div>
            <a href="#" class="text-blue-500 sm:block hidden">  </a>
        </div>

        <div class="grid md:grid-cols-2 divide divide-blue-200 gap-x-6 gap-y-4">
            @foreach ($chapters as $chapter)
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 flex-shrink-0 rounded-md relative mb-3">
                    <img src="{{ asset($chapter->logo) }}" class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
                </div>
                <div class="flex-1 border-b pb-3">
                    <a href="{{ route('fellowship.show', $chapter) }}"  class="text-lg font-semibold capitalize"> {{ $chapter->name }}</a>
               <div class="flex space-x-2 items-center text-sm">
                        
                    </div> 
                    <div class="flex items-center mt-2">
                         <div class="text-sm text-blue-500 ml-2"> {{ $chapter->address }}</div>
                    </div>
                </div>
                <a href="tel:{{ $chapter->phone }}" class="flex items-center justify-center h-9 px-3 rounded-md bg-blue-100 text-blue-500">
                <svg width="20px" height="20px" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                    <style>.cls-1{fill:#ff7900;}</style>
                    </defs>
                    <g id="phone">
                    <path class="cls-1" d="M23,17.11a5.92,5.92,0,0,0-4.63-3.95,1.5,1.5,0,0,0-1.51.66L15.6,15.63a.53.53,0,0,1-.61.2,13.25,13.25,0,0,1-3.6-2.14,13,13,0,0,1-2.94-3.52.5.5,0,0,1,.17-.69l1.63-1.09a1.52,1.52,0,0,0,.61-1.71A10.13,10.13,0,0,0,9.48,3.79a10.36,10.36,0,0,0-2.2-2.33A1.53,1.53,0,0,0,6,1.19a7.31,7.31,0,0,0-1.13.43A7.64,7.64,0,0,0,1.2,6.1a1.48,1.48,0,0,0,0,.93A24.63,24.63,0,0,0,7.73,17.44,24.76,24.76,0,0,0,17.12,23a1.41,1.41,0,0,0,.45.07,1.59,1.59,0,0,0,.48-.07,7.64,7.64,0,0,0,4.47-3.66A6.21,6.21,0,0,0,23,18,1.46,1.46,0,0,0,23,17.11Zm-1.33,1.74A6.61,6.61,0,0,1,17.73,22a.54.54,0,0,1-.31,0,23.61,23.61,0,0,1-9-5.29,23.74,23.74,0,0,1-6.27-10,.47.47,0,0,1,0-.31A6.59,6.59,0,0,1,5.29,2.52a5,5,0,0,1,1-.36h.1a.5.5,0,0,1,.32.11,9.4,9.4,0,0,1,2,2.09A9.07,9.07,0,0,1,9.9,7a.52.52,0,0,1-.21.6L8.06,8.64a1.54,1.54,0,0,0-.47,2,14.09,14.09,0,0,0,7,6.09,1.51,1.51,0,0,0,1.81-.58l1.21-1.81a.51.51,0,0,1,.51-.23A4.94,4.94,0,0,1,22,17.44a.58.58,0,0,1,0,.29A5.35,5.35,0,0,1,21.62,18.85Z"/>
                    </g>
                </svg> <span> Call </span>  </a>
            </div>
            @endforeach

           
        </div>


    </div>
</div>
@endsection
