@extends('layouts.main')
@section('title', 'Welcome')
@section('description', 'Welcome')
@section('main')

<div class="main_content">
    <div class="mcontainer"> 
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7"> 
                <div class="user_story grid md:grid-cols-5 grid-cols-3 gap-2 lg:-mx-20 relative">

                    @foreach ($poststories as $poststory)
                    <a href="{{ route('posts.show', $poststory) }}">
                        <div class="single_story">
                            <img src="{{ asset('storage/' . $poststory->images->first()->path) }}" alt="{{ $poststory->title }}" title="{{ $poststory->title }}">
                            <div class="story-avatar"> <img src="{{ $poststory->user->profile_photo_url }}" alt="{{ $poststory->title }}"></div>
                            <div class="story-content">
                                <h4>{{ $poststory->user->name }} </h4>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="card lg:mx-0 p-4">
                    <a href="{{ route('posts.index') }}">
                        <div class="flex space-x-3">
                            @auth
                            <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="w-10 h-10 rounded-full">
                            <input placeholder="What's Your Mind? {{ auth()->user()->lastname }}!" class="bg-blue-100 hover:bg-blue-200 flex-1 h-10 px-6 rounded-full">
                            @endauth
                            @guest
                            <img src="{{ asset('assets/images/logo.png') }}" class="w-10 h-10 rounded-full">
                            <input placeholder="What's Your Mind?" class="bg-blue-100 hover:bg-blue-200 flex-1 h-10 px-6 rounded-full">
                            @endguest
                        </div>
                        <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block" data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Photo/Video
                            </div>
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block" uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" title="" aria-expanded="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                                Tag Friend
                            </div>
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                Fealing /Activity
                            </div>
                        </div>
                    </a>
                </div>
                <!--Facebook Live Stream-->
                <!--       <div class="card lg:mx-0 uk-animation-slide-bottom-small">-->
                <!--<iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fweb.facebook.com%2Fisokancampusfellowship%2Fvideos%2F992460284753231%2F&show_text=false&width=560&t=0" width="586" height="321" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>-->
                <!--       </div>-->
                <!--Youtube Videos-->
                <!--       <div class="card lg:mx-0 uk-animation-slide-bottom-small">-->
                <!--<iframe width="586" height="321" src="https://www.youtube.com/embed/8YcC2LC8bII" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                <!--       </div>-->
                <!--End Live Stream-->

                @foreach ($user_fellowship_posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared  {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-blue-200 rounded-full p-2 transition -mr-1 blue:hover:bg-blue-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 blue:bg-blue-900 blue:text-blue-100 blue:border-blue-700" uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">
                                <ul class="space-y-1"> 
                                    <li>
                                        <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                                <i class="icon-brand-facebook-square"> </i>&nbsp; Share on Facebook</a>
                                        </div> 
                                    </li>
                                    <li> 
                                        <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $post) }}&amp;text=-{{ $post->title }}&amp;text=By {{ $post->user->name }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-twitter-square"> </i> &nbsp; Share on Twitter</a>
                                    </li>
                                    <li>

                                        <a href="https://api.whatsapp.com/share?url={{ route('posts.show', $post) }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on Whatsapp</a>
                                    </li> 
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{  $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
                    </div>
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">

                            @foreach ($post->images as $image)
                            <a href="{{ asset('storage/' . $image->path) }}" class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" title="{{ $post->title }}" alt="{{ $post->title }}" class="rounded-md w-full h-full">
                            </a>
                            @endforeach

                        </div>
                    </div> 
                    <div class="p-4 space-y-3">
                        <div class="flex space-x-4 lg:font-bold">
                            @auth 
                            @php
                            $liked = $post->likes()->where('user_id', auth()->user()->id)->exists();
                            @endphp 
                            @if (!$liked)
                            <form action="{{ route('posts.like', $post) }}" method="POST">
                                @csrf
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            @else 
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} You Like it</button> </div>
                                @endif
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endauth
                                @guest
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <a class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </div>
                                        <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                                </form>
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endguest
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($fellowship_posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared  {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-blue-200 rounded-full p-2 transition -mr-1 blue:hover:bg-blue-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 blue:bg-blue-900 blue:text-blue-100 blue:border-blue-700" uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">
                                <ul class="space-y-1"> 
                                    <li>
                                        <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                                <i class="icon-brand-facebook-square"> </i>&nbsp; Share on Facebook</a>
                                        </div> 
                                    </li>
                                    <li> 
                                        <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $post) }}&amp;text=-{{ $post->title }}&amp;text=By {{ $post->user->name }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-twitter-square"> </i> &nbsp; Share on Twitter</a>
                                    </li>
                                    <li>

                                        <a href="https://api.whatsapp.com/share?url={{ route('posts.show', $post) }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on Whatsapp</a>
                                    </li> 
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{  $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
                    </div>
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">

                            @foreach ($post->images as $image)
                            <a href="{{ asset('storage/' . $image->path) }}" class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" title="{{ $post->title }}" alt="{{ $post->title }}" class="rounded-md w-full h-full">
                            </a>
                            @endforeach

                        </div>
                    </div> 
                    <div class="p-4 space-y-3">
                        <div class="flex space-x-4 lg:font-bold">
                            @auth 
                            @php
                            $liked = $post->likes()->where('user_id', auth()->user()->id)->exists();
                            @endphp 
                            @if (!$liked)
                            <form action="{{ route('posts.like', $post) }}" method="POST">
                                @csrf
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            @else 
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} You Like it</button> </div>
                                @endif
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endauth
                                @guest
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <a class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </div>
                                        <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                                </form>
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endguest
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($anniversary_posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared  {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-blue-200 rounded-full p-2 transition -mr-1 blue:hover:bg-blue-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 blue:bg-blue-900 blue:text-blue-100 blue:border-blue-700" uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">
                                <ul class="space-y-1"> 
                                    <li>
                                        <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                                <i class="icon-brand-facebook-square"> </i>&nbsp; Share on Facebook</a>
                                        </div> 
                                    </li>
                                    <li> 
                                        <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $post) }}&amp;text=-{{ $post->title }}&amp;text=By {{ $post->user->name }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-twitter-square"> </i> &nbsp; Share on Twitter</a>
                                    </li>
                                    <li>

                                        <a href="https://api.whatsapp.com/share?url={{ route('posts.show', $post) }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                            <i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on Whatsapp</a>
                                    </li> 
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{  $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
                    </div>
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">

                            @foreach ($post->images as $image)
                            <a href="{{ asset('storage/' . $image->path) }}" class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" title="{{ $post->title }}" alt="{{ $post->title }}" class="rounded-md w-full h-full">
                            </a>
                            @endforeach

                        </div>
                    </div> 
                    <div class="p-4 space-y-3">
                        <div class="flex space-x-4 lg:font-bold">
                            @auth 
                            @php
                            $liked = $post->likes()->where('user_id', auth()->user()->id)->exists();
                            @endphp 
                            @if (!$liked)
                            <form action="{{ route('posts.like', $post) }}" method="POST">
                                @csrf
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            @else 
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} You Like it</button> </div>
                                @endif
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endauth
                                @guest
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <a class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full  text-blue lg:bg-blue-100 blue:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </div>
                                        <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                                </form>
                                <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20" class="blue:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>Share</a>
                                </div>
                                @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            <div class="lg:w-72 w-full">
                <a href="#">
                    <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                        <h3 class="text-line-through font-semibold mb-1"> Daily Bible Verse </h3>
                        <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                            <img src="{{asset('assets/images/icons/bible-icon.png')}}" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6">
                            <div id="dailyVersesWrapper"></div>
                            <script async defer src="https://dailyverses.net/get/verse.js?language=niv"></script>
                            </p>
                        </div>
                    </div>
                </a> 
                <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                    <h3 class="text-line-through font-semibold mb-1"> Daily Prayer Chant </h3>
                    @foreach ($sideprayers as $sideprayer)

                    <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                        <img src="{{asset('assets/images/icons/dua-hands.png')}}" class="w-9 h-9 mr-3" alt="">
                        <p class="line-clamp-2 leading-6">
                            <a href="{{ route('prayers.show', $sideprayer) }}">{{ $sideprayer->title }}</a>
                        </p>
                    </div>
                    @endforeach

                </div>
                <br>
                <h3 class="text-line-through font-semibold mb-1"> Suggested Audios - <a href="{{ route('audios.index') }}" class="hover:text-blue-600 hover:underline"> See All </a> </h3>
                @foreach ($sideaudios as $aud)
                <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50">
                    <a href="#" href="#" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                        <img src="{{ asset($aud->image) }}" class="absolute w-full h-full inset-0 " alt="{{ $aud->title }}">
                    </a>

                    <div class="flex-1">
                        <a href="#" class="text-base font-semibold capitalize leading-6 line-clamp-1 mt-1">{{
                                $aud->title }}
                        </a>
                        <audio class="js-player">
                            <source src="{{ $aud->file }}" />
                        </audio>
                        <div class="text-sm text-blue-500 mt-0.5"> {{ $aud->views }} Streamed</div>
                    </div>
                </div> 
                @endforeach 
                <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                    <h3 class="text-line-through font-semibold mb-1"> Suggested Products </h3>
                    @foreach ($sideproducts as $sideproduct)
                    <a href="{{ route('products.show', $sideproduct) }}">
                        <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                            <img src="{{ asset($sideproduct->image) }}" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6 mt-1"> <strong> {{ $sideproduct->name }} </strong> for
                                <strong> {{ $sideproduct->currency }}{{ number_format($sideproduct->price) }}
                                </strong>
                            </p>
                        </div>
                    </a>
                    @endforeach
                    <br>
                    <hr>
                    <a href="{{ route('products.index') }}" class="hover:text-blue-600 hover:underline"> See All </a>
                </div>
                <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                    <h3 class="text-line-through font-semibold mb-1"> Suggested Vacancies </h3>
                    @foreach ($sidejobs as $sidejob)
                    <a href="{{ route('vacancies.show', $sidejob) }}">
                        <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                            <img src="{{ asset($sidejob->image) }}" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6 mt-2"> <strong> {{ $sidejob->position }} </strong> Salary of
                                <strong> {{ $sidejob->currency }}{{ number_format($sidejob->salary, 2) }}
                                </strong>
                            </p>
                        </div>
                    </a>
                    @endforeach
                    <br>
                    <hr>
                    <a href="{{ route('vacancies.index') }}" class="hover:text-blue-600 hover:underline"> See All </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = Plyr.setup('.js-player');
    });
</script>
@endsection