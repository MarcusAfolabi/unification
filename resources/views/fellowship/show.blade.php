@extends('layouts.main')
@section('title', $fellowship->name )
@section('description', $fellowship->address)
@section('keywords', 'school, campus, schooling, student')
@section('canonical', 'https://cnsunification.org/fellowship')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="profile is_page">
            <div class="profiles_banner">
                <img src="{{asset('assets/images/avatars/profile-cover.jpg')}}" alt="Central Executives Council" title="Central Executives Council">
            </div>
            <div class="profiles_content">
                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src="{{ asset($fellowship->logo) }}" title="{{ $fellowship->name }}" alt="{{ $fellowship->name }}">
                    </div>
                    <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
                </div>
                <div class="profile_info">
                    <h1> {{ $fellowship->name }} </h1>
                    <p>{{ $fellowship->acronyms }} · {{ $fellowship_member }} members</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center -space-x-4">
                        @foreach($fellowship_users as $fellowship_user)
                        <img src="{{ asset($fellowship_user->profile_photo_url) }}" alt="{{$fellowship_user->name}}" uk-tooltip="{{$fellowship_user->name}} {{$fellowship_user->lastname}}" class="w-10 h-10 rounded-full border-2 border-white">
                        @endforeach
                        <div class="w-10 h-10 rounded-full flex justify-center items-center bg-blue-100 text-blue-500 font-semibold"> {{ $fellowship_member }}+
                        </div>
                    </div>
                </div>
            </div>
            <nav class="responsive-nav border-t -mb-0.5 lg:pl-2">
                <ul>
                    <li class="active"><a href="#0"> Home</a></li>
                    <li><a href="#0">Photos</a></li>
                    <li><a href="tel:{{ $fellowship->phone }}">Contact Chapter</a></li>
                </ul>
            </nav>
        </div>
        <div class="md:flex md:space-x-6 lg:mx-16">
            <div class="space-y-5 flex-shrink-0 md:w-7/12">
                <div class="card lg:mx-0 p-4" uk-toggle="target: #create-post-modal">
                    <div class="flex space-x-3">
                        @auth
                        <img src="{{asset(auth()->user()->profile_photo_url)}}" class="w-10 h-10 rounded-full">
                        @endauth
                        @guest
                        <img src="{{asset('assets/images/favicon/android-chrome-512x512.png')}}" class="w-10 h-10 rounded-full">
                        @endguest
                        <input placeholder="Dicuss ya matter" class="bg-blue-100 hover:bg-blue-200 flex-1 h-10 px-6 rounded-full">
                    </div>
                    <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                        <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block" data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Photo/Video
                        </div>
                        <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block" uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" title="" aria-expanded="false">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Tag Friend
                        </div>
                        <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Fealing /Activity
                        </div>
                    </div>
                </div>
                @forelse($fellowship_posts as $fellowship_post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ asset($fellowship_post->user->profile_photo_url) }}" uk-tooltip="{{$fellowship_post->user->name}}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-blue blue:text-blue-100"> {{$fellowship_post->user->name}} {{$fellowship_post->user->lastname}} </a>
                                <div class="text-blue-700 flex items-center space-x-2"> {{$fellowship_post->created_at->diffForHumans()}}<span> </span> <ion-icon name="people"></ion-icon></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="p-2 pt-0 leading-6 line-clamp-2 mt-1"> -->
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {!! $fellowship_post->content !!}
                    </div>
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">
                            @foreach ($fellowship_post->images as $image)
                            <a href="{{ asset('storage/' . $image->path) }}" class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" title="{{ $fellowship_post->title }}" alt="{{ $fellowship_post->title }}" class="rounded-md w-full h-full">
                                <!-- <div class="absolute bg-blue-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl"> + 15 more </div> -->
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 pt-2">
                            <div class="flex items-center">
                                <img src="assets/images/avatars/avatar-1.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white blue:border-blue-900">
                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white blue:border-blue-900 -ml-2">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white blue:border-blue-900 -ml-2">
                            </div>
                            <div class="blue:text-blue-100">
                                Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                            </div>
                        </div>

                        <div class="border-t py-4 space-y-4 blue:border-blue-600">
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="" class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div class="text-blue-700 py-2 px-3 rounded-md bg-blue-100 relative lg:ml-5 ml-2 lg:mr-12  blue:bg-blue-800 blue:text-blue-100">
                                        <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart"></urna> <i class="uil-grin-tongue-wink"> </i> </p>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-blue-100 transform rotate-45 blue:bg-blue-800"></div>
                                    </div>
                                    <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-blue-600"> <i class="uil-heart"></i> Love </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="" class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div class="text-blue-700 py-2 px-3 rounded-md bg-blue-100 relative lg:ml-5 ml-2 lg:mr-12  blue:bg-blue-800 blue:text-blue-100">
                                        <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. David !<i class="uil-grin-tongue-wink-alt"></i> </p>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-blue-100 transform rotate-45 blue:bg-blue-800"></div>
                                    </div>
                                    <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-blue-600"> <i class="uil-heart"></i> Love </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more Comments </a>

                        <div class="bg-blue-100 rounded-full relative blue:bg-blue-800 border-t">
                            <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                            <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                <a href="#">
                                    <ion-icon name="happy-outline" class="hover:bg-blue-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="image-outline" class="hover:bg-blue-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="link-outline" class="hover:bg-blue-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @empty
                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md blue:bg-blue-800 blue:text-white">
                        There's no recent post, photo or discussions from this fellowship</a>
                </div>
                @endforelse
            </div>
            <div class="w-full flex-shirink-0">
                <div class="card p-5 mb-5">
                    <h1 class="block text-lg font-bold"> Our Motto </h1>
                    <div class="space-y-4 mt-3">
                        <div class="flex items-center space-x-3">
                            <ion-icon name="alert-circle" class="bg-blue-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div>Remember thy Lord your God in thy days of your Youth...</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="thumbs-up" class="bg-blue-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div class="font-semibold">Total members are {{ $fellowship_member }} </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="globe" class="bg-blue-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div> <a href="#" class="text-blue-500"> {{ $fellowship->address }} </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget card p-5 border-t">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Chapter Units</h4>
                        </div>
                        <a href="#" class="text-blue-600 "> See all</a>
                    </div>
                    <div>
                        @foreach($unit_members as $unit_member)                       
                        <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50">
                            <a href="#" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                                <img src="{{ asset($fellowship->logo) }}" class="absolute w-full h-full inset-0 " alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="text-base font-semibold capitalize"> {{ $unit_member->unit->name }} </a>
                        <!-- <div class="text-sm text-blue-500 mt-0.5"> {{ $unit_counts }} members </div> -->
                            </div>
                            <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-blue-500 text-white">
                                Join
                            </a>
                        </div> 
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection