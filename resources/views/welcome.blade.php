@extends('layouts.main')
@section('title', 'Welcome')

@section('main')
{{-- <script src="https://cdn.plyr.io/3.5.6/plyr.js"></script> --}}

<div class="main_content">
    <div class="mcontainer">

        <!--  Feeds  -->
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7">

                <!-- user story -->
                <div class="user_story grid md:grid-cols-5 grid-cols-3 gap-2 lg:-mx-20 relative">

                    @foreach ($poststories as $poststory)
                    <a href="{{ route('posts.show', $poststory) }}">
                        <div class="single_story">
                            <img src="{{ asset($poststory->image1) }}" alt="{{ $poststory->title }}">
                            <div class="story-avatar"> <img src="{{ $poststory->user->profile_photo_url }}"
                                    alt="{{ $poststory->title }}"></div>
                            <div class="story-content">
                                <h4>{{ $poststory->user->name }} </h4>
                            </div>
                        </div>
                    </a>

                    @endforeach
                    <span class="absolute bg-white lg:flex items-center justify-center p-2 rounded-full
                            shadow-md text-xl w-9 z-10 uk-position-center-right -mr-4 hidden">
                        <i class="icon-feather-chevron-right"></i></span>

                </div>

                <!-- create post model redirect-->

                <div class="card lg:mx-0 p-4">
                    <a href="{{ route('posts.create') }}">
                        <div class="flex space-x-3">
                            @auth
                            <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="w-10 h-10 rounded-full">
                            <input placeholder="What's Your Mind? {{ auth()->user()->lastname }}!"
                                class="bg-blue-100 hover:bg-blue-200 flex-1 h-10 px-6 rounded-full">
                            @endauth
                            @guest
                            <img src="{{ asset('assets/images/logo.png') }}" class="w-10 h-10 rounded-full">
                            <input placeholder="What's Your Mind?"
                                class="bg-blue-100 hover:bg-blue-200 flex-1 h-10 px-6 rounded-full">
                            @endguest
                        </div>
                        <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block"
                                    data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Photo/Video
                            </div>
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block"
                                    uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    title="" aria-expanded="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                                Tag Friend
                            </div>
                            <div class="hover:bg-blue-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg class="bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
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

                @foreach ($posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="">
                                <img src="{{ $post->user->profile_photo_url }}"
                                    class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="{{ route('posts.show', $post) }}" class="text-black dark:text-blue-100">{{
                                    $post->title }} </a>
                                <div class="text-xs"> {{ $post->user->name }}
                                    posted {{ $post->created_at->diffForHumans() }} <ion-icon name="people">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-blue-200 rounded-full p-2 transition -mr-1 dark:hover:bg-blue-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 dark:bg-blue-900 dark:text-blue-100 dark:border-blue-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                <ul class="space-y-1">
                                    @guest

                                    <li>
                                        <div class="fb-share-button"
                                            data-href="https://web.facebook.com/isokancampusfellowship"
                                            data-layout="button" data-size="small"><a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse"
                                                class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                                <i class="icon-brand-facebook-square"> </i> Share</a>
                                        </div>

                                    </li>
                                    <li>

                                        <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $post) }}&amp;text=-{{ $post->title }}&amp;text=By {{ $post->user->name }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="icon-brand-twitter-square"> </i> Share</a>
                                    </li>
                                    <li>

                                        <a href="https://api.whatsapp.com/share?url={{ route('posts.show', $post) }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="icon-brand-whatsapp-square"> </i> Share</a>
                                    </li>
                                    @endguest
                                    @auth
                                    <li>
                                        <div class="fb-share-button"
                                            data-href="https://web.facebook.com/isokancampusfellowship"
                                            data-layout="button" data-size="small"><a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse"
                                                class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                                <i class="icon-brand-facebook-square"> </i> Share</a>
                                        </div>

                                    </li>
                                    <li>

                                        <a href="https://twitter.com/share?url={{ route('posts.show', $post) }}&amp;text=-{{ $post->title }}&amp;text=By {{ $post->user->name }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="icon-brand-twitter-square"> </i> Share</a>
                                    </li>
                                    <li>

                                        <a href="https://whatsapp.com/share?url={{ route('posts.show', $post) }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="icon-brand-whatsapp-square"> </i> Share</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="uil-edit-alt mr-1"></i> Edit Post
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-blue-800">
                                    </li>
                                    <li>
                                        <a href=""
                                            class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <i class="uil-trash-alt mr-1"></i> Delete
                                        </a>
                                    </li>
                                    @endauth

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="p-2 pt-0 leading-6 line-clamp-2 mt-1">

                        {!! $post->content !!}
                    </div> 
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">

                            <a href="{{ asset($post->image) }}" class="col-span-2">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                    class="rounded-md w-full lg:h-76 object-cover">
                            </a>
                            <a href="{{ asset($post->image1) }}">
                                <img src="{{ asset($post->image1) }}" alt="{{ $post->title }}"
                                    class="rounded-md w-full h-full">
                            </a>
                            <a href="{{ asset($post->image2) }}" class="relative">
                                <img src="{{ asset($post->image2) }}" alt="{{ $post->title }}"
                                    class="rounded-md w-full h-full">
                                <div
                                    class="absolute bg-blue-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">

                            <div class="fb-like" data-href="https://cnsunification.org/{{ route('posts.show', $post) }}"
                                data-width="" data-layout="button_count" data-action="like" data-size="small"
                                data-share="false">

                            </div>

                            <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship"
                                data-layout="button" data-size="small"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}&amp;text={{ $post->title }}&amp;src=sdkpreparse"
                                    class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="20" height="20" class="dark:text-blue-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>Share</a>
                            </div>

                        </div>



                    </div>

                </div>
                @endforeach


                {{-- Video Post --}}
                @foreach ($videos as $video)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="{{ route('videos.show', $video) }}">
                                <img src="{{ $video->user->profile_photo_url }}"
                                    class="bg-blue-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize ">
                                <a href="#" class="text-black dark:text-blue-100"> {{ $video->title }} </a>
                                <div class="text-xs"> {{ $video->user->name }}
                                    posted {{ $video->created_at->diffForHumans() }} <ion-icon name="people">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-blue-200 rounded-full p-2 transition -mr-1 dark:hover:bg-blue-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 dark:bg-blue-900 dark:text-blue-100 dark:border-blue-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                <ul class="space-y-1">

                                    @guest
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="uil-share-alt mr-1"></i> Share
                                        </a>
                                    </li>
                                    @endguest
                                    @auth
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="uil-share-alt mr-1"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('videos.edit', $video) }}"
                                            class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                            <i class="uil-edit-alt mr-1"></i> Edit Post
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-blue-800">
                                    </li>
                                    <li>
                                        <a href="{{ route('videos.destroy', $video->id) }}"
                                            class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <i class="uil-trash-alt mr-1"></i> Delete
                                        </a>
                                    </li>
                                    @endauth

                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="w-full h-full">
                        <div class="embed-video rounded">
                            <iframe src="{{ $video->url }}" frameborder="0" uk-video="automute: true; autoplay: false" allowfullscreen
                                uk-responsive></iframe>

                        </div>
                    </div>

                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <div class="fb-like" data-href="https://cnsunification.org/{{ route('videos.show', $video) }}"
                                data-width="" data-layout="button_count" data-action="like" data-size="small"
                                data-share="false">

                            </div>

                            <div class="fb-share-button" data-href="https://web.facebook.com/isokancampusfellowship"
                                data-layout="button" data-size="small"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ route('videos.show', $video) }}&amp;text={{ $video->title }}&amp;src=sdkpreparse"
                                    class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md dark:hover:bg-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="20" height="20" class="dark:text-blue-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>Share</a>
                            </div>
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
                @foreach ($sideaudios as $sideaudio)
                <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                    <h3 class="text-line-through font-semibold mb-1 leading-6 line-clamp-1 mt-1">
                        {{ $sideaudio->title }} by {{ $sideaudio->author }}</h3>
                    <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                        <img src="{{ asset($sideaudio->image) }}" class="w-9 h-9 mr-3" alt="">
                        <p class="line-clamp-2 leading-6">
                            <audio class="js-player">
                                <source src="{{ $sideaudio->file }}" />
                            </audio>
                        </p>

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
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
            const player = Plyr.setup('.js-player');
        });
</script>

@endsection
