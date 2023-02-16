@extends('layouts.main')
@section('title', $video->title)
@section('description', 'These are available videos from Unification Campus Fellowship')
@section('keywords', 'video, youtube, training, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/videos')

@section('main')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=562231884526354&autoLogAppEvents=1" nonce="t3DkjUu0"></script>
<div class="main_content">
    <div class="mcontainer">
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4">
                <div class="embed-video rounded-md">
                    <iframe src="{{ $video->url }}" frameborder="0" uk-video="automute: true" allowfullscreen uk-responsive></iframe>
                </div>
                <div class="py-5 space-y-4">
                    <div>
                        <h1 class="text-2xl font-semibold line-clamp-1"> {{ $video->title }} </h1>
                    </div>
                    <div class="md:flex items-center justify-between">
                        <a href="#" class="flex items-center space-x-3">
                            <img uk-tooltip="{{ $video->user->name }}" src="{{ asset($video->user->profile_photo_url) }}" alt="{{ $video->user->name }}" class="w-10 rounded-full">
                            <div class="">
                                <div class="text-base font-semibold"> {{ $video->user->name }} </div>
                                <div class="text-xs"> Published {{ $video->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        <div class="flex items-center space-x-3 md:pt-0 pt-2">

                            <div class="flex h-2 w-36 bg-blue-200 rounded-lg overflow-hidden">
                                <div class="w-{{ $video->views }} bg-gradient-to-br from-red-400 to-blue-400 h-4"></div>
                            </div>
                            <div class="like-btn" uk-tooltip="I see it">
                                <i class="uil-thumbs-up"></i>
                                <span class="likes">{{ $video->views }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold pt-2"> Description </div>
                    {!! $video->content !!}
                    <hr>
                    <div class="my-5">
                        <div class="fb-comments" data-href="https://cnsunification.org/{{ route('videos.show', $video) }}" data-width="" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/4 w-full">
                <h3 class="text-lg font-bold mb-2"> Others shorts </h3>
                @foreach ($sidevideos as $sidevideo)
                <div class="divide-y -mt-3 py-2 relative">
                    <a href="{{ route('videos.show', $sidevideo) }}"  title="{{ $sidevideo->title }}" class="w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0 block">
                        <img src="{{ asset($sidevideo->image) }}"  title="{{ $sidevideo->title }}" alt="{{ $sidevideo->title }}" class="w-full h-full absolute inset-0 object-cover">
                        <img src="{{ asset('assets/images/icon-play.svg') }}" class="w-12 h-12 uk-position-center"  alt="{{ $sidevideo->title }}" title="{{ $sidevideo->title }}">
                        <a href="{{ route('videos.show', $sidevideo) }}" class="line-clamp-2 font-semibold">
                        {{ $sidevideo->title }}</a>
                    <div class="flex space-x-2 items-center text-sm pt-1">
                        <div> {{ $sidevideo->created_at->diffForHumans() }}</div>
                        <div>·</div>
                        <div> {{ $sidevideo->views }} views</div>
                    </div>
                    </a>
                 
                </div> 
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection