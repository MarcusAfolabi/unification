@extends('layouts.main')
@section('title', 'Central Executives Council')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="lg:flex lg:space-x-12">
            <div class="lg:w-4/4">            
                <div class=" md:mb-4 mb-3">
                    <h2 class="text-2xl font-semibold"> Central Executives Council </h2>
                    <nav class="responsive-nav style-2 md:m-0 -mx-4">
                        <ul>
                            <li class="active"><a href="#" class="lg:px-2">  2022 - 2026 </a></li>
                            <!-- <li class=""><a href="#" class="lg:px-2">  2018 - 2022 </a></li>
                            <li class=""><a href="#" class="lg:px-2">  2014 - 2018 </a></li>  -->
                        </ul>
                    </nav>
                </div>
                <div class="card divide-y divide-blue-100 sm:m-0 -mx-4">
                    @forelse($executives as $executive)
                    <div class="flex items-start flex-wrap p-7 sm:space-x-6">
                        <a href="#" class="w-14 h-14 relative mt-1 order-1">
                            <img src="{{ asset($executive->image)}}" alt="{{ $executive->name }}" uk-tooltip="title: {{ $executive->name }}" class="rounded-md">
                        </a>
                        <div class="flex-1 sm:order-2">
                            <h4 class="text-base text-blue-500 font-medium mb-2">{{ $executive->position }} </h4>
                            <a href="#">
                                <h3 class="text-xl font-medium mb-4"> {{ $executive->name }}  </h3>
                            </a>
                            <p>  {{ $executive->profile}} 
                            </p>
                            <div class="job-tags mt-5 mb-2 space-x-2.5 space-y-2">
                            Hobbies: <a href="#" class="border px-3 py-1.5 rounded-md text-sm inline-block"> {{ $executive->hobby }}  </a> 
                            <a href="mailto:{{ $executive->email }}" title="Mail" class="border px-3 py-1.5 rounded-md text-sm inline-block"> <i class="icon-material-baseline-mail-outline"></i> Mail  </a> 
                            <a href="tel:{{ $executive->phone }}" title="Call" class="border px-3 py-1.5 rounded-md text-sm inline-block"><i class="icon-feather-phone-call"></i> Call  </a> 
                            </div>
                        </div>
                    </div> 
                    @empty
                    <p class="text-center text-opacity-75"> Nobody has showed up</p>
                    @endforelse
                </div>           
            </div>            
        </div>
    </div>
</div>
@endsection