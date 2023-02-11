@extends('layouts.main')
@section('title', 'All Videos')
@section('description', 'These are confirmed opening from various industrial companies and enterprise. Apply if you can, in time')
@section('keywords', 'jobs, mentoring, business, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/vacancies')

@section('main')

<div class="main_content">
    <div class="mcontainer">
@auth
@if (auth()->user()->isAdmin())
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('videos.create') }}"><i class="icon-material-outline-add"></i> New Video
                    </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}</p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="videos"
                        placeholder="Search for Videos, Events and more.." autocomplete="off">
                </form>
            </div>
            @if ($videos->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Title</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Video URL</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Video File</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Creator</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Views</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($videos as $key => $video)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('videos.show', $video) }}">
                                                {{ $video->title }} </a> </td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($video->image) }}"> <img src="{{ asset($video->image) }}"
                                                    alt="{{ $video->name }}" class="rounded-lg"
                                                    style="max-height: 50px; max-width:50px" srcset=""></a></th>

                                        {{-- @if (count($video) > 0) --}}
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ $video->url }}" target="_blank">
                                                Open Url</a></td>
                                        {{-- @else --}}
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ $video->file }}" target="_blank">
                                                Open File</a></td>
                                        {{-- @endif --}}

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $video->user->name }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $video->created_at->diffForHumans() }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('videos.edit', $video) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('videos.destroy', $video) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <script
                                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                                                crossorigin="anonymous"></script>

                                            <div class="switches-list">
                                                <div class="switch-container">
                                                    @if($video->status =='1')
                                                    <label class="switch"><a href="{{ url('/status', $video) }}"><input
                                                                type="checkbox" checked>
                                                            <span class="switch-button"></span>Active</a> </label>
                                                    @else
                                                    <label class="switch"> <a href="{{ url('/status', $video) }}"><input
                                                                type="checkbox">
                                                            <span class="switch-button"></span>InActive </a></label>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $video->views }} Watched</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> Nothing Here!</p>
                        @endif
                    </div>





                </div>
            </div>
            @elseif (!auth()->user()->isAdmin())

            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> My Videos </h2>

                </div>
                <a href="{{ route('videos.create') }}" uk-toggle
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> Create </span>
                </a>
            </div>

            <!--  videos  list -->
            @if ($videos->count() > 0)

            <div class="divide-y">
                @foreach ($videos as $video)
                @if (auth()->user()->id === $video->user->id)
                <div class="flex md:space-x-6 space-x-4 md:py-5 py-3 relative">
                    <a href="{{ route('videos.show', $video) }}"
                        class="md:w-64 md:h-40 w-36 h-24 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="{{ asset($video->image) }}" alt="{{ $video->title }}"
                            class="w-full h-full absolute inset-0 object-cover">
                        <span
                            class="absolute bg-black bg-opacity-60 bottom-1 font-semibold px-1.5 py-0.5 right-1 rounded text-white text-xs">
                        </span>
                        <img src="assets/images/icon-play.svg" class="w-12 h-12 uk-position-center"
                            alt="{{ $video->title }}">
                    </a>
                    <div class="flex-1 space-y-2">

                        <a href="{{ route('videos.show', $video) }}" class="md:text-xl font-semibold line-clamp-2"> {{
                            $video->title }}</a>
                        {{-- <p class="leading-6 line-clamp-2 mt-2"> {!! $video->content !!} </p> --}}
                        <div class="border-b dark:border-gray-700 leading-6 line-clamp-3 mt-5">

                            {!! $video->content !!}
                        </div>
                        {{-- <a href="#" class="font-semibold block text-sm"> {{ $video->user->name }}</a> --}}

                        <div class="flex items-center justify-between">
                            <div class="flex space-x-3 items-center text-sm md:pt-3">
                                <div> {{ $video->created_at->diffForHumans() }}</div>
                                <div class="md:block hidden">·</div>
                                <div> {{ $video->views }} views</div>
                            </div>
                            <a href="{{ route('videos.edit', $video) }}"> <span class="icon-feather-edit "></span></a>
                            <form action="{{ route('videos.destroy', $video) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                    <span class="icon-feather-trash-2"></span> </button>

                            </form>
                        </div>

                        <div class="absolute top-1 right-0 md:inline hidden">
                            <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 uk-drop uk-drop-bottom-right"
                                uk-drop="mode: hover;pos: top-right" style="left: -188px; top: -12px;">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-share-alt mr-1"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('videos.edit', $video)}}"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-edit-alt mr-1"></i> Edit Post
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="{{route('videos.destroy', $video)}}"
                                            class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <i class="uil-trash-alt mr-1"></i> Delete
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                @else
                <p class="text-center text-opacity-75"> No Post </p>
                @endif
                @endforeach
            </div>
            @else
            <p class="text-center text-opacity-75"> Nothing Here!</p>
            @endif

            @endif
            @endauth

            @guest

            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> Videos </h2>
                    <nav class="responsive-nav border-b md:m-0 -mx-4">
                        <ul>
                            <li class="active"><a href="#" class="lg:px-2"> Suggestions </a></li>
                        </ul>
                    </nav>
                </div>
                <a href="{{ route('videos.create') }}" uk-toggle
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> Create </span>
                </a>
            </div>

            <!-- Video slider -->

            <div class="relative" uk-slider="finite: true">

                <div class="uk-slider-container px-1 py-3">
                    <ul
                        class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                        @foreach ($videos as $video)
                        <li>
                            <a href="{{ route('videos.show', $video) }}"
                                class="w-full md:h-36 h-28 overflow-hidden rounded-lg relative block">
                                <img src="{{ $video->image }}" alt="{{ $video->title }}"
                                    class="w-full h-full absolute inset-0 object-cover">
                                <span
                                    class="absolute bg-black bg-opacity-60 bottom-1 font-semibold px-1.5 py-0.5 right-1 rounded text-white text-xs">
                                </span>
                                <img src="{{ asset('assets/images/icon-play.svg') }}"
                                    class="w-12 h-12 uk-position-center" alt="{{ $video->title }}">
                            </a>
                            <div class="pt-3">
                                <a href="video-watch.html" class="font-semibold line-clamp-2"> {{ $video->title }}
                                </a>
                                <div class="pt-2">
                                    <a href="#" href="video-watch.html" class="text-sm">
                                        {{ $video->user->name }} </a>
                                    <div class="flex space-x-2 items-center text-sm mt-1">
                                        <div> {{ $video->created_at->diffForHumans() }}</div>
                                        <div class="md:block hidden">·</div>
                                        <div> {{ $video->views }} views</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                </div>
            </div>

            @endguest

        </div>
    </div>
    @endsection
