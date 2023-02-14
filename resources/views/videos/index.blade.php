@extends('layouts.main')@section('title', 'All Videos')
@section('description', 'These are confirmed opening from various industrial companies and enterprise. Apply if you can, in time')@section('keywords', 'jobs, mentoring, business, coaching, seminar, empowerment, workshop, small business, job offer, training, empowerment program, federal programs')
@section('canonical', 'https://cnsunification.org/vacancies')@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-video" uk-toggle><i class="icon-material-outline-add"></i> Add New </a>
                </h5>
            </div>
        </div>
        @if (session('status')) <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status')}} </p>@endif
        @if (auth()->user()->role==='admin')
    </div> <div class="card">
        <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
        <div class="header_search"><i class="uil-search-alt"></i>
            <form action=""><input type="text" class="form-control" name="videos" placeholder="Search for Videos, Events and more.." autocomplete="off"></form>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="border-b bg-blue-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">S/No</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Title</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Image</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Video URL</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Video File</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Creator</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Date</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Edit</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Delete</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Status</th>
                                    <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Views</th>
                                </tr>
                            </thead>
                            <tbody>@forelse ($videos as $key=>$video) <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{ ++$key}}</td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('videos.show', $video)}}">{{ $video->title}} </a></td>
                                    <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($video->image)}}"><img src="{{ asset($video->image)}}" alt="{{ $video->name}}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>{{-- @if (count($video) >0) --}}
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ $video->url}}" target="_blank">Open Url</a></td>{{-- @else --}}
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ $video->file}}" target="_blank">Open File</a></td>{{-- @endif --}}
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $video->user->name}}</td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $video->created_at->diffForHumans()}}</td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('videos.edit', $video)}}"><span class="icon-feather-edit "></span></a></td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('videos.destroy', $video)}}" method="POST">@method('delete') @csrf <button type="submit" onclick="return confirm('Hey, Are you sure about this?');"><span class="icon-feather-trash-2"></span></button></form>
                                    </td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                        <div class="switches-list">
                                            <div class="switch-container">@if($video->status=='1') <label class="switch"><a href="{{ url('/status', $video)}}"><input type="checkbox" checked><span class="switch-button"></span>Active</a></label>@else <label class="switch"><a href="{{ url('/status', $video)}}"><input type="checkbox"><span class="switch-button"></span>InActive </a></label>@endif </div>
                                        </div>
                                    </td>
                                    <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $video->views}} Watched</td>
                                </tr>@empty <p class="text-center text-opacity-75">No Video </p>@endforelse </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>@elseif (auth()->user()->role==='member')
        <div class="divide-y">@foreach ($videos as $video) @if (auth()->user()->id===$video->user->id)
            <div class="flex md:space-x-6 space-x-4 md:py-5 py-3 relative"><a href="{{ route('videos.show', $video)}}" class="md:w-64 md:h-40 w-36 h-24 overflow-hidden rounded-lg relative shadow-sm"><img src="{{ asset($video->image)}}" alt="{{ $video->title}}" class="w-full h-full absolute inset-0 object-cover"><span class="absolute bg-black bg-opacity-60 bottom-1 font-semibold px-1.5 py-0.5 right-1 rounded text-white text-xs"></span><img src="assets/images/icon-play.svg" class="w-12 h-12 uk-position-center" alt="{{ $video->title}}"></a>
                <div class="flex-1 space-y-2"><a href="{{ route('videos.show', $video)}}" class="md:text-xl font-semibold line-clamp-2">{{ $video->title}}</a>
                    <div class="border-b blue:border-blue-700 leading-6 line-clamp-3 mt-5">{!! $video->content !!} </div>
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-3 items-center text-sm md:pt-3">
                            <div>{{ $video->created_at->diffForHumans()}}</div>
                            <div class="md:block hidden">·</div>
                            <div>{{ $video->views}} views</div>
                        </div><a href="{{ route('videos.edit', $video)}}"><span class="icon-feather-edit "></span></a>
                        <form action="{{ route('videos.destroy', $video)}}" method="POST">@method('delete') @csrf <button type="submit" onclick="return confirm('Hey, Are you sure about this?');"><span class="icon-feather-trash-2"></span></button></form>
                    </div>
                    <div class="absolute top-1 right-0 md:inline hidden"><a href="#" class="hover:bg-blue-200 p-1.5 inline-block rounded-full" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg></a>
                        <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-blue-500 hidden text-base border border-blue-100 blue:bg-blue-900 blue:text-blue-100 blue:border-blue-700 uk-drop uk-drop-bottom-right" uk-drop="mode: hover;pos: top-right" style="left: -188px; top: -12px;">
                            <ul class="space-y-1">
                                <li><a href="#" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800"><i class="uil-share-alt mr-1"></i>Share </a></li>
                                <li><a href="{{route('videos.edit', $video)}}" class="flex items-center px-3 py-2 hover:bg-blue-200 hover:text-blue-800 rounded-md blue:hover:bg-blue-800"><i class="uil-edit-alt mr-1"></i>Edit Post </a></li>
                                <li>
                                    <hr class="-mx-2 my-2 blue:border-blue-800">
                                </li>
                                <li><a href="{{route('videos.destroy', $video)}}" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md blue:hover:bg-red-600"><i class="uil-trash-alt mr-1"></i>Delete </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>@else <p class="text-center text-opacity-75">No Video </p>@endif @endforeach
        </div>@endif
    </div>
</div>
<div id="modal-video" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Short </h2>
            <h5>You can add video from youtube or vimeo embed url, anniversary events and other fellowship activities from here.</h5>
        </div>
        <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input shadow-sm" id="title"  required  name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Title </span>
                </div>
                <div uk-form-custom class="w-full py-3 shadow-sm">
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" id="image"  required name="image">
                    <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        Choose Video Cover</a>
                </div>
                <label>Similar to this <b>https://www.youtube.com/embed/o6-4tWKxFYk</b>, else it will fail!</label>
                <div class="line">
                    <input class="line__input shadow-sm" id="video_url" required  name="url" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ old('url') }}" autocomplete="off">
                    <span for="video_url" class="line__placeholder">https://www.youtube.com/embed</span>
                </div>
                <div class="line">
                    <textarea name="content" required  class="with-border px-3 py-3 shadow-sm" placeholder="Video description" >
                    {{ old('content') }}</textarea>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> Your Video Is Subject to Review and Proof-reading. Ensure To Be
                    Accurate And Concise. </p>
                <button class="button blue" type="submit">PUBLISH</button>
            </div>
        </form>
    </div>
</div>
@endsection