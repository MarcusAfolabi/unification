@extends('layouts.main')@section('title', $prayer->title)@section('description', $prayer->content)@section('keywords', 'When men prayers, God answers prayers, if you can pray, God can answer, praying hands, answering prayer, pray, bible')@section('canonical', 'https://cnsunification.org/prayers')@section('main') <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=562231884526354&autoLogAppEvents=1" nonce="t3DkjUu0"></script>
<div class="main_content">
    <div class="mcontainer">
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 space-y-5">
                <div class="card">
                    <div class="p-7">
                        <h1 class="lg:text-3xl text-2xl font-semibold mb-6">{{ $prayer->title}} </h1>
                        <div class="flex items-center space-x-3 my-4 pb-4 border-b border-blue-100">
                            <div>{{-- <div class="text-base font-semibold">{{ $post->user->name}} <span class="icon-feather-shield"></span>{{ $post->user->yourFellowship}}</div>--}} <div class="text-xs"><b>Date:</b>{{ date('l-d-M-Y', strtotime($prayer->publication))}} </div>
                        </div>
                    </div>
                    <div class="space-y-3">{!! $prayer->content !!} </div>
                    <hr class="-mx-2 my-2 blue:border-blue-800">
                </div>
            </div>
            <div class="card p-6">
                <div class="border-t py-4 space-y-4 dark:border-blue-600">
                    <div class="fb-comments" data-href="https://.cnsunification.org/{{ route('prayers.show', $prayer)}}" data-width="" data-numposts="5"></div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/4 w-full">
            <div uk-sticky="offset:100" class="uk-sticky">
                <h2 class="text-lg font-semibold mb-3">Similar Prayers </h2>
                <ul>@foreach ($sideprayers as $sideprayer ) <li><a href="{{route('prayers.show', $sideprayer)}}" class="hover:bg-blue-100 rounded-md p-2 -mx-2 block">
                            <h3 class="font-medium line-clamp-2">{{ $sideprayer->title}} </h3>
                            <div class="flex items-center my-auto text-xs space-x-1.5">
                                <div>{{ $sideprayer->created_at->diffForHumans()}}</div>
                                <div class="pb-1">. </div><ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                <div>{{ $sideprayer->views}} praying</div>
                            </div>
                        </a></li>@endforeach </ul>
            </div>
        </div>
    </div>
</div>
</div>@endsection