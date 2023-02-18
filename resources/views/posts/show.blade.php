@extends('layouts.main')
@section('title', $post->title)
@section('description', $post->intro)
@section('keywords', $post->category)
@section('main')
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
                        <div class="flex items-center space-x-3 my-4 pb-4 border-b border-blue-100">
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
                        <hr class="-mx-2 my-2 blue:border-blue-800">
                        <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
                            @foreach ($post->images as $image)
                            <div>
                                <a class="uk-inline" href="{{ asset('storage/' . $image->path) }}" data-caption="{{ $post->title }}">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            @endforeach
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
                                    <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-blue-100">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                    <div> {{ $post->likes->count() }} Like</div>
                                </a>
                                @endif
                                @endauth
                                @auth
                                @php
                                $comment = $post->comments()->where('user_id', auth()->user()->id)->exists();
                                @endphp
                                @if(!$comment)
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-blue-100">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div> Share thought</div>
                                </a>
                                @else
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-blue-100">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div> {{ $post->comments->count() }} Comment</div>
                                </a>
                                @endif
                                @endauth
                                @guest
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <a href="#" class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full  text-black lg:bg-blue-100 blue:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="blue:text-blue-100">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </div>
                                        <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                                </form>
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-blue-100">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div> {{ $post->comments->count() }} Comment</div>
                                </a>
                                <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                    <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-blue-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                    </div>
                                    <div> Share</div>
                                </a>
                                @endguest
                            </div>
                            <div class="flex items-center space-x-3 pt-2">
                                <div class="flex items-center">
                                    @foreach($list_comments as $comment)
                                    <img src="{{ asset($comment->user->profile_photo_url) }}" uk-tooltip="title: {{$comment->user->name}}" alt="{{$comment->user->name}}" class="w-6 h-6 rounded-full border-2 border-white dark:border-blue-900">
                                    @endforeach
                                </div>
                            </div>

                            <div class="border-t py-4 space-y-4 dark:border-blue-600">
                                @foreach($comments as $comment)
                                <div class="flex">
                                    <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                        <img src="{{ asset($comment->user->profile_photo_url) }}" uk-tooltip="title: {{$comment->user->name}}" alt="{{$comment->user->name}}" class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div>
                                        <div class="text-blue-700 py-2 px-3 rounded-md bg-blue-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-blue-800 dark:text-blue-100">
                                            <p class="leading-6">{{ $comment->content }}</p>
                                            <div class="absolute w-3 h-3 top-3 -left-1 bg-blue-100 transform rotate-45 dark:bg-blue-800"></div>
                                        </div>
                                        <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                            <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a href="#" class="hover:text-blue-600 hover:bold"> Share your view </a>
                            <x-jet-validation-errors class="mb-4" />
                            <div class="bg-blue-100 rounded-full relative dark:bg-blue-800 border-t">
                                <form method="POST" action="{{ route('comments.add', $post) }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input placeholder="Add your Comment..." name="content" id="content" required class="bg-transparent max-h-10 shadow-none px-5">
                                    <button type="submit" class="-m-0.5 absolute bottom-0 flex items-center right-3 buttom-5 text-xl">
                                        <ion-icon name="happy-outline" class="hover:bg-blue-100 p-1.5 rounded-full"></ion-icon>
                                    </button>

                            </div>
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
                                            <img src="{{ asset('storage/' . $relatedpost->images->first()->path) }}" title="{{ $relatedpost->title }}" alt="{{ $relatedpost->title }}" class="w-full h-full absolute inset-0 object-cover">
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
                            <a class="absolute bg-blue top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-blue-800 dark:text-blue" href="#" uk-slider-item="previous">
                                <ion-icon name="chevron-back-outline"></ion-icon>
                                </ion-icon>
                            </a>
                            <a class="absolute bg-blue top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-blue-800 dark:text-blue" href="#" uk-slider-item="next">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="lg:w-1/4 w-full">
                <div uk-sticky="offset:100" class="uk-sticky">
                    <h2 class="text-lg font-semibold mb-3"> Others stories </h2>
                    <ul>
                        @foreach ($sideposts as $sidepost )
                        <li>
                            <a href="{{route('posts.show', $sidepost)}}" class="hover:bg-blue-100 rounded-md p-2 -mx-2 block">
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