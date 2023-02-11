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
                <p class="font-medium text-gray-500 leading-6"> Find your chapter location and contact </p>
            </div>
            <a href="#" class="text-blue-500 sm:block hidden">  </a>
        </div>

        <div class="grid md:grid-cols-2 divide divide-gray-200 gap-x-6 gap-y-4">
            @foreach ($chapters as $chapter)
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 flex-shrink-0 rounded-md relative mb-3">
                    <img src="{{ asset($chapter->chapter_logo) }}" class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
                </div>
                <div class="flex-1 border-b pb-3">
                    <a href="timeline-group.html"  class="text-lg font-semibold capitalize"> {{ $chapter->name }}</a>
                    {{-- <div class="flex space-x-2 items-center text-sm">
                        <div> 16K Members</div>
                        <div>·</div>
                        <div> 12 posts a week</div>
                    </div> --}}
                    <div class="flex items-center mt-2">
                        <img src="assets/images/avatars/avatar-2.jpg" class="w-6 rounded-full border-2 border-gray-200 -mr-2" alt="">
                        <img src="assets/images/avatars/avatar-4.jpg" class="w-6 rounded-full border-2 border-gray-200" alt="">
                        <div class="text-sm text-gray-500 ml-2"> {{ $chapter->address }}</div>
                    </div>

                </div>
                <a href="tel:{{ $chapter->phone }}" class="flex items-center justify-center h-9 px-3 rounded-md bg-blue-100 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 mr-2">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                            </svg>Call chapter
                        </a>
            </div>
            @endforeach

           
        </div>


    </div>
</div>
@endsection
