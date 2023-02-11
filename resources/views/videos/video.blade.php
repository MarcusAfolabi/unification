@extends('layouts.main')
@section('title', $video->title)
@section('description', 'These are available videos from Unification Campus Fellowship')
@section('keywords', 'video, youtube, training, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/videos')

@section('main')
<div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=562231884526354&autoLogAppEvents=1"
        nonce="t3DkjUu0"></script>
    <div class="main_content">
        <div class="mcontainer">

            <div class="lg:flex lg:space-x-10">

                <div class="lg:w-3/4">

                    <div class="embed-video rounded">
                        <iframe src="{{ $video->url }}" frameborder="0" uk-video="automute: true" allowfullscreen
                            uk-responsive></iframe>

                    </div>

                    <div class="py-5 space-y-4">

                        <div>
                            <h1 class="text-2xl font-semibold line-clamp-1"> {{ $video->title }} </h1>
                            <p> {{ $video->views }} views </p>
                        </div>

                        <div class="md:flex items-center justify-between">
                            <a href="#" class="flex items-center space-x-3">
                                <img src="{{ asset($video->user->name) }}" alt="" class="w-10 rounded-full">
                                <div class="">
                                    <div class="text-base font-semibold"> {{ $video->user->name }} </div>
                                    <div class="text-xs"> Published on {{ $video->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                            <div class="flex items-center space-x-3 md:pt-0 pt-2">
                                <div class="like-btn" uk-tooltip="Unlike it">
                                    <i class="uil-thumbs-down"></i>
                                    <span class="likes">16</span>
                                </div>
                                <div class="flex h-2 w-36 bg-gray-200 rounded-lg overflow-hidden">
                                    <div class="w-2/3 bg-gradient-to-br from-purple-400 to-blue-400 h-4"></div>
                                </div>
                                <div class="like-btn" uk-tooltip="I like it">
                                    <i class="uil-thumbs-up"></i>
                                    <span class="likes">21</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-lg font-semibold pt-2"> Description </div>
                        {!! $video->content !!}
                        <hr>

                        <div class="my-5">

                            <div class="fb-comments"
                            data-href="https://.cnsunification.org/{{ route('posts.show', $video) }}"
                            data-width="" data-numposts="5"></div>


                        </div>

                    </div>


                </div>

                <!-- sidebar -->
                <div class="lg:w-1/4 w-full">

                    <h3 class="text-xl font-bold mb-2"> Related Videos </h3>

                    @foreach ($sidevideos as $sidevideo)
                        <div class="py-2 relative">
                            <a href="{{ route('videos.show', $sidevideo) }}"
                                class="w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0 block">
                                <img src="{{ asset($sidevideo->image) }}" alt="{{ $sidevideo->title }}"
                                    class="w-full h-full absolute inset-0 object-cover">
                                <img src="{{ asset('assets/images/icon-play.svg') }}" class="w-12 h-12 uk-position-center"
                                    alt="{{ $sidevideo->title }}">
                                <span
                                    class="absolute bg-black bg-opacity-60 bottom-1 font-semibold px-1.5 py-0.5 right-1 rounded text-white text-xs">
                                </span>
                            </a>
                            <div class="flex-1 pt-3 relative">
                                <a href="{{ route('videos.show', $sidevideo) }}" class="line-clamp-2 font-semibold">
                                    {{ $sidevideo->title }}</a>
                                <div class="flex space-x-2 items-center text-sm pt-1">
                                    <div> {{ $sidevideo->created_at->diffForHumans() }}</div>
                                    <div>·</div>
                                    <div> {{ $sidevideo->views }} views</div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>


        </div>
    </div>
@endsection
