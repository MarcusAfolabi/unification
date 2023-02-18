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
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
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
                                        <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share"><i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on WhatsApp</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{ $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
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
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> Share thought</div>
                            </a>
                            @else
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
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
                                        <svg width="20px" height="20px" viewBox="0 -1 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4652 8.91302L10.3983 8.84448C12.0024 8.96323 13.3693 7.69379 13.3693 6.08529V3.24354C13.3693 1.45218 14.8214 0 16.6128 0H17.083C19.1341 0 20.7968 1.66271 20.7968 3.71376V8.91302H27.5425C30.2544 8.91302 32.3377 11.315 31.9541 13.9998L30.4386 24.6084C30.0204 27.5357 27.5133 29.7101 24.5563 29.7101H7.42725V8.91302H10.4652Z" fill="url(#paint0_radial_103_1511)" />
                                            <path d="M0 11.884V26.739C0 28.3799 1.33017 29.71 2.97101 29.71H10.3985V8.91296H2.97101C1.33017 8.91296 0 10.2431 0 11.884Z" fill="url(#paint1_linear_103_1511)" />
                                            <path d="M5.19896 26.739C6.42959 26.739 7.42721 25.7414 7.42721 24.5107C7.42721 23.2801 6.42959 22.2825 5.19896 22.2825C3.96833 22.2825 2.9707 23.2801 2.9707 24.5107C2.9707 25.7414 3.96833 26.739 5.19896 26.739Z" fill="white" />
                                            <defs>
                                                <radialGradient id="paint0_radial_103_1511" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.9501 9.55395) rotate(56.8531) scale(21.7342 17.9758)">
                                                    <stop stop-color="#FADE6C" />
                                                    <stop offset="0.327145" stop-color="#FED715" />
                                                    <stop offset="1" stop-color="#FC9900" />
                                                </radialGradient>
                                                <linearGradient id="paint1_linear_103_1511" x1="5.19926" y1="8.91296" x2="5.19926" y2="29.71" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9D65F5" />
                                                    <stop offset="1" stop-color="#6025CE" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            <a href="{{route('posts.show', $post)}}" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> {{ $post->comments->count() }} Comment</div>
                            </a>
                            <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                    <svg width="20px" height="20px" viewBox="-1.5 0 259 259" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                        <g>
                                            <path d="M67.6631045,221.823373 L71.8484512,223.916047 C89.2873956,234.379413 108.819013,239.262318 128.350631,239.262318 L128.350631,239.262318 C189.735716,239.262318 239.959876,189.038158 239.959876,127.653073 C239.959876,98.3556467 228.101393,69.7557778 207.17466,48.8290445 C186.247927,27.9023111 158.345616,16.0438289 128.350631,16.0438289 C66.9655467,16.0438289 16.7413867,66.2679889 17.4389445,128.350631 C17.4389445,149.277365 23.7169645,169.50654 34.1803311,186.945485 L36.9705622,191.130831 L25.8096378,232.28674 L67.6631045,221.823373 Z" fill="#00E676">

                                            </path>
                                            <path d="M219.033142,37.66812 C195.316178,13.2535978 162.530962,0 129.048189,0 C57.8972956,0 0.697557778,57.8972956 1.39511556,128.350631 C1.39511556,150.67248 7.67313556,172.296771 18.1365022,191.828389 L0,258.096378 L67.6631045,240.657433 C86.4971645,251.1208 107.423898,256.003705 128.350631,256.003705 L128.350631,256.003705 C198.803967,256.003705 256.003705,198.106409 256.003705,127.653073 C256.003705,93.4727423 242.750107,61.3850845 219.033142,37.66812 Z M129.048189,234.379413 L129.048189,234.379413 C110.214129,234.379413 91.380069,229.496509 75.3362401,219.7307 L71.1508934,217.638027 L30.6925422,228.101393 L41.1559089,188.3406 L38.3656778,184.155253 C7.67313556,134.628651 22.3218489,69.05822 72.5460089,38.3656778 C122.770169,7.67313556 187.643042,22.3218489 218.335585,72.5460089 C249.028127,122.770169 234.379413,187.643042 184.155253,218.335585 C168.111425,228.798951 148.579807,234.379413 129.048189,234.379413 Z M190.433273,156.9505 L182.760138,153.462711 C182.760138,153.462711 171.599213,148.579807 164.623636,145.092018 C163.926078,145.092018 163.22852,144.39446 162.530962,144.39446 C160.438289,144.39446 159.043173,145.092018 157.648058,145.789576 L157.648058,145.789576 C157.648058,145.789576 156.9505,146.487133 147.184691,157.648058 C146.487133,159.043173 145.092018,159.740731 143.696902,159.740731 L142.999345,159.740731 C142.301787,159.740731 140.906671,159.043173 140.209113,158.345616 L136.721325,156.9505 L136.721325,156.9505 C129.048189,153.462711 122.072611,149.277365 116.492149,143.696902 C115.097033,142.301787 113.00436,140.906671 111.609245,139.511556 C106.72634,134.628651 101.843436,129.048189 98.3556467,122.770169 L97.658089,121.375053 C96.9605312,120.677496 96.9605312,119.979938 96.2629734,118.584822 C96.2629734,117.189707 96.2629734,115.794591 96.9605312,115.097033 C96.9605312,115.097033 99.7507623,111.609245 101.843436,109.516571 C103.238551,108.121456 103.936109,106.028782 105.331225,104.633667 C106.72634,102.540993 107.423898,99.7507623 106.72634,97.658089 C106.028782,94.1703001 97.658089,75.3362401 95.5654156,71.1508934 C94.1703001,69.05822 92.7751845,68.3606623 90.6825112,67.6631045 L88.5898378,67.6631045 C87.1947223,67.6631045 85.1020489,67.6631045 83.0093756,67.6631045 C81.6142601,67.6631045 80.2191445,68.3606623 78.8240289,68.3606623 L78.1264712,69.05822 C76.7313556,69.7557778 75.3362401,71.1508934 73.9411245,71.8484512 C72.5460089,73.2435667 71.8484512,74.6386823 70.4533356,76.0337978 C65.5704312,82.3118178 62.7802,89.9849534 62.7802,97.658089 L62.7802,97.658089 C62.7802,103.238551 64.1753156,108.819013 66.2679889,113.701918 L66.9655467,115.794591 C73.2435667,129.048189 81.6142601,140.906671 92.7751845,151.370038 L95.5654156,154.160269 C97.658089,156.252942 99.7507623,157.648058 101.145878,159.740731 C115.794591,172.296771 132.535978,181.365022 151.370038,186.247927 C153.462711,186.945485 156.252942,186.945485 158.345616,187.643042 L158.345616,187.643042 C160.438289,187.643042 163.22852,187.643042 165.321193,187.643042 C168.808982,187.643042 172.994329,186.247927 175.78456,184.852811 C177.877233,183.457696 179.272349,183.457696 180.667465,182.06258 L182.06258,180.667465 C183.457696,179.272349 184.852811,178.574791 186.247927,177.179676 C187.643042,175.78456 189.038158,174.389445 189.735716,172.994329 C191.130831,170.204098 191.828389,166.716309 192.525947,163.22852 C192.525947,161.833405 192.525947,159.740731 192.525947,158.345616 C192.525947,158.345616 191.828389,157.648058 190.433273,156.9505 Z" fill="#FFFFFF">

                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div> Share to WhatsApp</div>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($fellowship_posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
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
                                        <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share"><i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on WhatsApp</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{ $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
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
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> Share thought</div>
                            </a>
                            @else
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
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
                                        <svg width="20px" height="20px" viewBox="0 -1 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4652 8.91302L10.3983 8.84448C12.0024 8.96323 13.3693 7.69379 13.3693 6.08529V3.24354C13.3693 1.45218 14.8214 0 16.6128 0H17.083C19.1341 0 20.7968 1.66271 20.7968 3.71376V8.91302H27.5425C30.2544 8.91302 32.3377 11.315 31.9541 13.9998L30.4386 24.6084C30.0204 27.5357 27.5133 29.7101 24.5563 29.7101H7.42725V8.91302H10.4652Z" fill="url(#paint0_radial_103_1511)" />
                                            <path d="M0 11.884V26.739C0 28.3799 1.33017 29.71 2.97101 29.71H10.3985V8.91296H2.97101C1.33017 8.91296 0 10.2431 0 11.884Z" fill="url(#paint1_linear_103_1511)" />
                                            <path d="M5.19896 26.739C6.42959 26.739 7.42721 25.7414 7.42721 24.5107C7.42721 23.2801 6.42959 22.2825 5.19896 22.2825C3.96833 22.2825 2.9707 23.2801 2.9707 24.5107C2.9707 25.7414 3.96833 26.739 5.19896 26.739Z" fill="white" />
                                            <defs>
                                                <radialGradient id="paint0_radial_103_1511" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.9501 9.55395) rotate(56.8531) scale(21.7342 17.9758)">
                                                    <stop stop-color="#FADE6C" />
                                                    <stop offset="0.327145" stop-color="#FED715" />
                                                    <stop offset="1" stop-color="#FC9900" />
                                                </radialGradient>
                                                <linearGradient id="paint1_linear_103_1511" x1="5.19926" y1="8.91296" x2="5.19926" y2="29.71" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9D65F5" />
                                                    <stop offset="1" stop-color="#6025CE" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            <a href="{{route('posts.show', $post)}}" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> {{ $post->comments->count() }} Comment</div>
                            </a>
                            <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                    <svg width="20px" height="20px" viewBox="-1.5 0 259 259" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                        <g>
                                            <path d="M67.6631045,221.823373 L71.8484512,223.916047 C89.2873956,234.379413 108.819013,239.262318 128.350631,239.262318 L128.350631,239.262318 C189.735716,239.262318 239.959876,189.038158 239.959876,127.653073 C239.959876,98.3556467 228.101393,69.7557778 207.17466,48.8290445 C186.247927,27.9023111 158.345616,16.0438289 128.350631,16.0438289 C66.9655467,16.0438289 16.7413867,66.2679889 17.4389445,128.350631 C17.4389445,149.277365 23.7169645,169.50654 34.1803311,186.945485 L36.9705622,191.130831 L25.8096378,232.28674 L67.6631045,221.823373 Z" fill="#00E676">

                                            </path>
                                            <path d="M219.033142,37.66812 C195.316178,13.2535978 162.530962,0 129.048189,0 C57.8972956,0 0.697557778,57.8972956 1.39511556,128.350631 C1.39511556,150.67248 7.67313556,172.296771 18.1365022,191.828389 L0,258.096378 L67.6631045,240.657433 C86.4971645,251.1208 107.423898,256.003705 128.350631,256.003705 L128.350631,256.003705 C198.803967,256.003705 256.003705,198.106409 256.003705,127.653073 C256.003705,93.4727423 242.750107,61.3850845 219.033142,37.66812 Z M129.048189,234.379413 L129.048189,234.379413 C110.214129,234.379413 91.380069,229.496509 75.3362401,219.7307 L71.1508934,217.638027 L30.6925422,228.101393 L41.1559089,188.3406 L38.3656778,184.155253 C7.67313556,134.628651 22.3218489,69.05822 72.5460089,38.3656778 C122.770169,7.67313556 187.643042,22.3218489 218.335585,72.5460089 C249.028127,122.770169 234.379413,187.643042 184.155253,218.335585 C168.111425,228.798951 148.579807,234.379413 129.048189,234.379413 Z M190.433273,156.9505 L182.760138,153.462711 C182.760138,153.462711 171.599213,148.579807 164.623636,145.092018 C163.926078,145.092018 163.22852,144.39446 162.530962,144.39446 C160.438289,144.39446 159.043173,145.092018 157.648058,145.789576 L157.648058,145.789576 C157.648058,145.789576 156.9505,146.487133 147.184691,157.648058 C146.487133,159.043173 145.092018,159.740731 143.696902,159.740731 L142.999345,159.740731 C142.301787,159.740731 140.906671,159.043173 140.209113,158.345616 L136.721325,156.9505 L136.721325,156.9505 C129.048189,153.462711 122.072611,149.277365 116.492149,143.696902 C115.097033,142.301787 113.00436,140.906671 111.609245,139.511556 C106.72634,134.628651 101.843436,129.048189 98.3556467,122.770169 L97.658089,121.375053 C96.9605312,120.677496 96.9605312,119.979938 96.2629734,118.584822 C96.2629734,117.189707 96.2629734,115.794591 96.9605312,115.097033 C96.9605312,115.097033 99.7507623,111.609245 101.843436,109.516571 C103.238551,108.121456 103.936109,106.028782 105.331225,104.633667 C106.72634,102.540993 107.423898,99.7507623 106.72634,97.658089 C106.028782,94.1703001 97.658089,75.3362401 95.5654156,71.1508934 C94.1703001,69.05822 92.7751845,68.3606623 90.6825112,67.6631045 L88.5898378,67.6631045 C87.1947223,67.6631045 85.1020489,67.6631045 83.0093756,67.6631045 C81.6142601,67.6631045 80.2191445,68.3606623 78.8240289,68.3606623 L78.1264712,69.05822 C76.7313556,69.7557778 75.3362401,71.1508934 73.9411245,71.8484512 C72.5460089,73.2435667 71.8484512,74.6386823 70.4533356,76.0337978 C65.5704312,82.3118178 62.7802,89.9849534 62.7802,97.658089 L62.7802,97.658089 C62.7802,103.238551 64.1753156,108.819013 66.2679889,113.701918 L66.9655467,115.794591 C73.2435667,129.048189 81.6142601,140.906671 92.7751845,151.370038 L95.5654156,154.160269 C97.658089,156.252942 99.7507623,157.648058 101.145878,159.740731 C115.794591,172.296771 132.535978,181.365022 151.370038,186.247927 C153.462711,186.945485 156.252942,186.945485 158.345616,187.643042 L158.345616,187.643042 C160.438289,187.643042 163.22852,187.643042 165.321193,187.643042 C168.808982,187.643042 172.994329,186.247927 175.78456,184.852811 C177.877233,183.457696 179.272349,183.457696 180.667465,182.06258 L182.06258,180.667465 C183.457696,179.272349 184.852811,178.574791 186.247927,177.179676 C187.643042,175.78456 189.038158,174.389445 189.735716,172.994329 C191.130831,170.204098 191.828389,166.716309 192.525947,163.22852 C192.525947,161.833405 192.525947,159.740731 192.525947,158.345616 C192.525947,158.345616 191.828389,157.648058 190.433273,156.9505 Z" fill="#FFFFFF">

                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div> Share to WhatsApp</div>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($anniversary_posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black blue:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    shared {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
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
                                        <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share"><i class="icon-brand-whatsapp-square"> </i> &nbsp; Share on WhatsApp</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b blue:border-blue-700">
                        {{ $post->intro  }}... <a class="text-sm text-blue-500 mt-0.5" href="{{ route('posts.show', $post) }}">Read more</a>
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
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> Share thought</div>
                            </a>
                            @else
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
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
                                        <svg width="20px" height="20px" viewBox="0 -1 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4652 8.91302L10.3983 8.84448C12.0024 8.96323 13.3693 7.69379 13.3693 6.08529V3.24354C13.3693 1.45218 14.8214 0 16.6128 0H17.083C19.1341 0 20.7968 1.66271 20.7968 3.71376V8.91302H27.5425C30.2544 8.91302 32.3377 11.315 31.9541 13.9998L30.4386 24.6084C30.0204 27.5357 27.5133 29.7101 24.5563 29.7101H7.42725V8.91302H10.4652Z" fill="url(#paint0_radial_103_1511)" />
                                            <path d="M0 11.884V26.739C0 28.3799 1.33017 29.71 2.97101 29.71H10.3985V8.91296H2.97101C1.33017 8.91296 0 10.2431 0 11.884Z" fill="url(#paint1_linear_103_1511)" />
                                            <path d="M5.19896 26.739C6.42959 26.739 7.42721 25.7414 7.42721 24.5107C7.42721 23.2801 6.42959 22.2825 5.19896 22.2825C3.96833 22.2825 2.9707 23.2801 2.9707 24.5107C2.9707 25.7414 3.96833 26.739 5.19896 26.739Z" fill="white" />
                                            <defs>
                                                <radialGradient id="paint0_radial_103_1511" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.9501 9.55395) rotate(56.8531) scale(21.7342 17.9758)">
                                                    <stop stop-color="#FADE6C" />
                                                    <stop offset="0.327145" stop-color="#FED715" />
                                                    <stop offset="1" stop-color="#FC9900" />
                                                </radialGradient>
                                                <linearGradient id="paint1_linear_103_1511" x1="5.19926" y1="8.91296" x2="5.19926" y2="29.71" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9D65F5" />
                                                    <stop offset="1" stop-color="#6025CE" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary"> {{ $post->likes->count() }} Like </button> </div>
                            </form>
                            <a href="{{route('posts.show', $post)}}" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M298.155 403.601c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.905-16.984 56.905-37.935s-13.338-38.331-56.905-37.934z m227.614 0c-43.567 0.395-56.905 16.984-56.905 37.934 0 20.952 15.115 37.935 56.905 37.935 41.788 0 56.901-16.984 56.901-37.935 0.001-20.951-13.336-38.331-56.901-37.934z m142.256-253.55H383.511c-172.849 0-312.967 140.12-312.967 312.967 0 112.509 59.367 211.151 148.483 266.31 38.117 23.594 22.226 179.433 22.226 179.433s186.946-132.776 199.159-132.776h227.613c172.849 0 312.967-140.12 312.967-312.967S840.874 150.051 668.025 150.051z m0.387 585.628H433.059c-10.721 0-153.872 97.21-153.872 97.21s-6.404-118.311-40.405-138.034c-71.3-41.359-129.705-145.439-130.304-233.022-0.967-141.385 132.829-272.858 274.645-273.846h285.29c137.871 0 274.647 136.418 274.647 273.846-0.001 144.334-135.791 275.821-274.648 273.846z m84.968-332.078c-43.565 0.395-56.901 16.984-56.901 37.934 0 20.952 15.113 37.935 56.901 37.935 41.79 0 56.903-16.984 56.903-37.935s-13.336-38.331-56.903-37.934z" fill="#F41919" /></svg>
                                </div>
                                <div> {{ $post->comments->count() }} Comment</div>
                            </a>
                            <a href="whatsapp://send?text={{ route('posts.show', $post) }}" data-action="share/whatsapp/share" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-blue-100 dark:bg-blue-600">
                                    <svg width="20px" height="20px" viewBox="-1.5 0 259 259" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                        <g>
                                            <path d="M67.6631045,221.823373 L71.8484512,223.916047 C89.2873956,234.379413 108.819013,239.262318 128.350631,239.262318 L128.350631,239.262318 C189.735716,239.262318 239.959876,189.038158 239.959876,127.653073 C239.959876,98.3556467 228.101393,69.7557778 207.17466,48.8290445 C186.247927,27.9023111 158.345616,16.0438289 128.350631,16.0438289 C66.9655467,16.0438289 16.7413867,66.2679889 17.4389445,128.350631 C17.4389445,149.277365 23.7169645,169.50654 34.1803311,186.945485 L36.9705622,191.130831 L25.8096378,232.28674 L67.6631045,221.823373 Z" fill="#00E676">

                                            </path>
                                            <path d="M219.033142,37.66812 C195.316178,13.2535978 162.530962,0 129.048189,0 C57.8972956,0 0.697557778,57.8972956 1.39511556,128.350631 C1.39511556,150.67248 7.67313556,172.296771 18.1365022,191.828389 L0,258.096378 L67.6631045,240.657433 C86.4971645,251.1208 107.423898,256.003705 128.350631,256.003705 L128.350631,256.003705 C198.803967,256.003705 256.003705,198.106409 256.003705,127.653073 C256.003705,93.4727423 242.750107,61.3850845 219.033142,37.66812 Z M129.048189,234.379413 L129.048189,234.379413 C110.214129,234.379413 91.380069,229.496509 75.3362401,219.7307 L71.1508934,217.638027 L30.6925422,228.101393 L41.1559089,188.3406 L38.3656778,184.155253 C7.67313556,134.628651 22.3218489,69.05822 72.5460089,38.3656778 C122.770169,7.67313556 187.643042,22.3218489 218.335585,72.5460089 C249.028127,122.770169 234.379413,187.643042 184.155253,218.335585 C168.111425,228.798951 148.579807,234.379413 129.048189,234.379413 Z M190.433273,156.9505 L182.760138,153.462711 C182.760138,153.462711 171.599213,148.579807 164.623636,145.092018 C163.926078,145.092018 163.22852,144.39446 162.530962,144.39446 C160.438289,144.39446 159.043173,145.092018 157.648058,145.789576 L157.648058,145.789576 C157.648058,145.789576 156.9505,146.487133 147.184691,157.648058 C146.487133,159.043173 145.092018,159.740731 143.696902,159.740731 L142.999345,159.740731 C142.301787,159.740731 140.906671,159.043173 140.209113,158.345616 L136.721325,156.9505 L136.721325,156.9505 C129.048189,153.462711 122.072611,149.277365 116.492149,143.696902 C115.097033,142.301787 113.00436,140.906671 111.609245,139.511556 C106.72634,134.628651 101.843436,129.048189 98.3556467,122.770169 L97.658089,121.375053 C96.9605312,120.677496 96.9605312,119.979938 96.2629734,118.584822 C96.2629734,117.189707 96.2629734,115.794591 96.9605312,115.097033 C96.9605312,115.097033 99.7507623,111.609245 101.843436,109.516571 C103.238551,108.121456 103.936109,106.028782 105.331225,104.633667 C106.72634,102.540993 107.423898,99.7507623 106.72634,97.658089 C106.028782,94.1703001 97.658089,75.3362401 95.5654156,71.1508934 C94.1703001,69.05822 92.7751845,68.3606623 90.6825112,67.6631045 L88.5898378,67.6631045 C87.1947223,67.6631045 85.1020489,67.6631045 83.0093756,67.6631045 C81.6142601,67.6631045 80.2191445,68.3606623 78.8240289,68.3606623 L78.1264712,69.05822 C76.7313556,69.7557778 75.3362401,71.1508934 73.9411245,71.8484512 C72.5460089,73.2435667 71.8484512,74.6386823 70.4533356,76.0337978 C65.5704312,82.3118178 62.7802,89.9849534 62.7802,97.658089 L62.7802,97.658089 C62.7802,103.238551 64.1753156,108.819013 66.2679889,113.701918 L66.9655467,115.794591 C73.2435667,129.048189 81.6142601,140.906671 92.7751845,151.370038 L95.5654156,154.160269 C97.658089,156.252942 99.7507623,157.648058 101.145878,159.740731 C115.794591,172.296771 132.535978,181.365022 151.370038,186.247927 C153.462711,186.945485 156.252942,186.945485 158.345616,187.643042 L158.345616,187.643042 C160.438289,187.643042 163.22852,187.643042 165.321193,187.643042 C168.808982,187.643042 172.994329,186.247927 175.78456,184.852811 C177.877233,183.457696 179.272349,183.457696 180.667465,182.06258 L182.06258,180.667465 C183.457696,179.272349 184.852811,178.574791 186.247927,177.179676 C187.643042,175.78456 189.038158,174.389445 189.735716,172.994329 C191.130831,170.204098 191.828389,166.716309 192.525947,163.22852 C192.525947,161.833405 192.525947,159.740731 192.525947,158.345616 C192.525947,158.345616 191.828389,157.648058 190.433273,156.9505 Z" fill="#FFFFFF">

                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div> Share to WhatsApp</div>
                            </a>
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