@extends('layouts.main')
@section('title', $post->title)
@section('description', $post->intro)
@section('keywords', $post->category)
@section('main') 
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=562231884526354&autoLogAppEvents=1" nonce="t3DkjUu0"></script>
<div class="main_content">
    <div class="mcontainer"> 
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 space-y-5"> 
                <div class="card">
                    <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                        <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="w-full h-full absolute inset-0 object-cover">
                    </div>
                    <div class="p-7">
                        <h1 class="lg:text-3xl text-2xl font-semibold mb-6"> {{ $post->title }} </h1>
                        <div class="flex items-center space-x-3 my-4 pb-4 border-b border-gray-100">
                            @if ($post->images)
                            <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" title="{{ $post->user->name }}" class="w-10 rounded-full">
                            @endif
                            <div>
                                <div class="text-base font-semibold"> {{ $post->user->name }} <span class="icon-feather-shield"></span></div>
                                <div class="text-xs"> Published {{ $post->created_at->diffForHumans() }} </div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            {!! $post->content !!}
                        </div>
                        <hr class="-mx-2 my-2 blue:border-gray-800">
                        <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
                            @foreach ($post->images as $image)
                            <div>
                                <a class="uk-inline" href="{{ asset('storage/' . $image->path) }}" data-caption="{{ $post->title }}">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- related articles -->
                <div class="card p-6 relative">
                    <h1 class="block text-lg font-semibold"> Related Posts </h1>
                    <div class="relative" uk-slider="finite: true">
                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                                @foreach ($relatedposts as $relatedpost)
                                <li>
                                    <div>
                                        <a href="{{ route('posts.show', $relatedpost) }}" class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                            <img src="{{ asset('storage/' . $relatedpost->images->first()->path) }}"  title="{{ $relatedpost->title }}"alt="{{ $relatedpost->title }}" class="w-full h-full absolute inset-0 object-cover">
                                        </a>
                                        <div class="pt-3">
                                            <a href="{{ route('posts.show', $relatedpost) }}" class="font-semibold line-clamp-2"> {{ $relatedpost->title }}</a>
                                            <div class="flex space-x-2 items-center text-sm pt-2">
                                                <div> {{ $relatedpost->created_at->diffForHumans() }} </div>
                                                <div class="md:block hidden">·</div>
                                                <div class="flex items-center">
                                                    <ion-icon name="chatbox-ellipses-outline" class="text-base leading-0 mr-2"></ion-icon> {{ $relatedpost->views }} views
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <a class="absolute bg-blue top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-blue" href="#" uk-slider-item="previous">
                                <ion-icon name="chevron-back-outline"></ion-icon>
                                </ion-icon>
                            </a>
                            <a class="absolute bg-blue top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-blue" href="#" uk-slider-item="next">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card p-6">
                    <div class="fb-comments" data-href="https://cnsunification.org/{{ route('posts.show', $post) }}" data-width="" data-numposts="10"></div>
                </div>
            </div>
            <div class="lg:w-1/4 w-full">
                <div uk-sticky="offset:100" class="uk-sticky">
                    <h2 class="text-lg font-semibold mb-3"> Others stories </h2>
                    <ul>
                        @foreach ($sideposts as $sidepost )
                        <li>
                            <a href="{{route('posts.show', $sidepost)}}" class="hover:bg-gray-100 rounded-md p-2 -mx-2 block">
                                <h3 class="font-medium line-clamp-2"> {{ $sidepost->title }} </h3>
                                <div class="flex items-center my-auto text-xs space-x-1.5">
                                    <div> {{ $sidepost->created_at->diffForHumans() }}</div>
                                    <div class="pb-1"> . </div>
                                    <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                    <div> {{ $sidepost->views }} view</div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <br>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection