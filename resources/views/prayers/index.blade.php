@extends('layouts.main')@section('title', 'All Prayers')@section('description', 'This is all prayer supplications')@section('keywords', 'praying hands, answering prayer, pray, bible')@section('canonical', 'https://cnsunification.org/prayers')@section('main') <div class="main_content">
    <div class="mcontainer">@auth @if(auth()->user()->role==='admin' ) <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold"><a href="{{ route('prayers.create')}}"><i class="icon-material-outline-add"></i>New Prayer </a></h5>
            </div>
        </div>@if (session('status')) <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status')}}</p>@endif <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action=""><input type="text" class="form-control" name="prayers" placeholder="Search for Bible Study, Prayer and more.." autocomplete="off"></form>
            </div>
            <hr><br>@if ($prayers->count() >0) <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-blue-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">S/No</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Title</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Author</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Publication</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Category</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Creator</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Views</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>@foreach ($prayers as $key=>$prayer) <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{ ++$key}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('prayers.show', $prayer)}}" target="_blank">{{ $prayer->title}} </a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $prayer->author}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ date('l-d-M-Y', strtotime($prayer->publication))}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $prayer->category}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $prayer->user->name}} </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $prayer->created_at->diffForHumans()}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('prayers.edit', $prayer)}}"><span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                            <div class="switches-list">
                                                <div class="switch-container">@if($prayer->status=='1') <label class="switch"><a href="{{ url('/status', $prayer)}}"><input type="checkbox" checked><span class="switch-button"></span>Active</a></label>@else <label class="switch"><a href="{{ url('/status', $prayer)}}"><input type="checkbox"><span class="switch-button"></span>InActive </a></label>@endif </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{ $prayer->views}} prayed</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('prayers.destroy', $prayer)}}" method="POST">@method('delete') @csrf <button type="submit" onclick="return confirm('Hey, Are you sure about this?');"><span class="icon-feather-trash-2"></span></button></form>
                                        </td>
                                    </tr>@endforeach </tbody>
                            </table>
                        </div>@else <p class="text-center text-opacity-75">Nothing Here!</p>@endif
                    </div>{{ $prayers->links()}}
                </div>
            </div>
        </div>
    </div>@elseif(auth()->user()->role==='member' ) <div class="lg:flex lg:space-x-10">
        <div class="lg:w-2/3">
            <div class="my-5 flex justify-between pb-3">
                <h2 class="text-2xl font-semibold">Daily Prayers </h2>
            </div>
            @if ($prayers->count() > 0) <div class="divide-y -mt-3 card px-5 py-2 ">@foreach ($prayers as $prayer) @if (auth()->user()->id===$prayer->user->id) <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="flex-1 relative md:mt-0 mt-4">{{-- <a href="" class="text-xl font-semibold leading-6">{{ $prayer->title}}</a>--}} <a href="{{ route('prayers.show', $prayer)}}" class="text-xl font-semibold leading-6">{{ $prayer->title}}</a>
                        <div class="font-semibold mt-2">Minister:{{ $prayer->author}} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div>{{ $prayer->created_at->diffForHumans()}}</div>
                            <div>·</div><a href="{{ route('prayers.edit', $prayer)}}"><span class="icon-feather-edit "></span>Edit</a>
                            <div>·</div>
                            <div>
                                <form action="{{ route('prayers.destroy', $prayer)}}" method="POST">@method('delete') @csrf <button type="submit" onclick="return confirm('Hey, Are you sure about this?');"><span class="icon-feather-trash-2"></span>Delete</button></form>
                            </div>
                        </div>
                    </div>
                </div>@endif @endforeach </div>@else <p class="text-center text-opacity-75">Nothing Here!</p>@endif
        </div>
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">
                <div class="border-b flex items-center justify-between p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent prayer</h2>
                    </div>
                </div>
                <div class="p-3">@foreach ($recentprayers as $prayer) <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50"><a href="{{ route('prayers.show', $prayer)}}" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative"><img src="{{ asset('assets/images/icons/bible-icon.png')}}" class="absolute w-full h-full inset-0 " alt="{{ $prayer->title}}"></a>
                        <div class="flex-1"><a href="{{ route('prayers.show', $prayer)}}" class="text-base font-semibold capitalize line-clamp-1 mt-1">{{ $prayer->title}} </a>
                            <div class="text-sm text-blue-500 mt-0.5">{{ $prayer->views}} Praying</div>
                        </div>
                    </div>@endforeach </div><a href="{{ route('prayers.index')}}" class="border-t block text-center py-2">See all </a>
            </div>
        </div>
    </div>@endif @endauth @guest <div class="lg:flex lg:space-x-10">
        <div class="lg:w-2/3">
            <div class="my-5 flex justify-between pb-3">
                <h2 class="text-2xl font-semibold">Top prayers </h2>
            </div>
            <div class="divide-y -mt-3 card px-5 py-2 ">@foreach ($prayers as $prayer) <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full"><a href="{{ route('prayers.show', $prayer)}}">
                        <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0"><img src="{{ asset($prayer->image)}}" alt="{{ $prayer->title}}" class="w-full h-full absolute inset-0 object-cover"></div>
                    </a>
                    <div class="flex-1 relative md:mt-0 mt-4"><a href="{{ route('prayers.show', $prayer)}}" class="text-xl font-semibold leading-6">{{ $prayer->title}}</a>
                        <div class="font-semibold mt-2">Minister:{{ $prayer->author}} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div>{{ $prayer->created_at->diffForHumans()}}</div>
                        </div>
                    </div>
                </div>@endforeach </div><br>{{ $prayers->links()}}
        </div>
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">
                <div class="border-b flex items-center justify-between p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent Prayer</h2>
                    </div>
                </div>
                <div class="p-3">@foreach ($recentprayers as $prayer) <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50"><a href="{{ route('prayers.show', $prayer)}}" iv class="text-base font-semibold capitalize">{{ $prayer->title}} </a>
                        <div class="flex-1">{{-- <a href="{{ asset($prayer->file)}}" class="text-base font-semibold capitalize">{{ $prayer->title}} </a>--}} <div class="text-sm text-blue-500 mt-0.5">{{ $prayer->views}} Praying</div>
                        </div><a href="{{ route('prayers.show', $prayer)}}" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">Pray </a>
                    </div>@endforeach </div><a href="#" class="border-t block text-center py-2">See all </a>
            </div>
        </div>
    </div>@endguest
</div>
</div>@endsection