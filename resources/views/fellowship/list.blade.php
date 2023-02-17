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
                <i class="icon-feather-phone-call"></i><span> &nbsp; Call </span>  </a>
                <a href="{{ route('fellowship.show', $chapter) }}}}" class="flex items-center justify-center h-9 px-3 rounded-md bg-blue-100 text-blue-500">
                <i class="icon-material-outline-launch"></i> <span> &nbsp; Visit </span>  </a>
            </div>
            @endforeach           
        </div>
    </div>
</div>
@endsection
