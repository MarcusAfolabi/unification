@extends('layouts.main')
@section('title', 'All Audio')
@section('description', 'This is all video')
@section('keywords', 'Audio, Message')
@section('canonical', 'https://cnsunification.org/audios')

@section('main')

<div class="main_content">
    <div class="mcontainer">
        <!--  breadcrumb -->
        @auth
        @if (auth()->user()->role==='admin')

        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('audios.create') }}"><i class="icon-material-outline-add"></i> New Audio </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}</p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="audios" placeholder="Search for Audio and more.."
                        autocomplete="off">
                </form>
            </div>
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
                                            URL</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Creator</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Views
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @forelse ($audios as $key => $aud)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="#"> {{ $aud->title }} </a>
                                        </td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($aud->image) }}"> <img src="{{ asset($aud->image) }}"
                                                    alt="{{ $aud->name }}" class="rounded-lg"
                                                    style="max-height: 50px; max-width:50px" srcset=""></a></th>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ $aud->file }}" target="_blank">
                                                Open Url</a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $aud->user->name }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $aud->created_at->diffForHumans() }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('audios.edit', $aud) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <script
                                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                                                crossorigin="anonymous"></script>

                                            <div class="switches-list">
                                                <div class="switch-container">
                                                    @if($aud->status =='1')
                                                    <label class="switch"><a href="{{ url('/status', $aud) }}"><input
                                                                type="checkbox" checked>
                                                            <span class="switch-button"></span>Active</a> </label>
                                                    @else
                                                    <label class="switch"> <a href="{{ url('/status', $aud) }}"><input
                                                                type="checkbox">
                                                            <span class="switch-button"></span>InActive </a></label>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $aud->views }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('audios.destroy', $aud) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Nothing Here!</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    {{ $audios->links() }} 
                </div>
            </div>
        </div>
    </div>

    @elseif (auth()->user()->role==='member')
    <div class="lg:flex lg:space-x-10">

        <div class="lg:w-2/3"> 

            <div class="my-5 flex justify-between pb-3">
                <h2 class="text-2xl font-semibold"> My Audio Clips </h2>
            </div>
            <div class="flex justify-between items-center relative md:mb-4 mb-3">

                <a href="{{ route('audios.create') }}"
                    class="flex items-center justify-center h-10 w-10 z-10 rounded-full bg-blue-600 text-white absolute right-0"
                    data-tippy-placement="left" title="Create New Audio">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>

            <div class="divide-y -mt-3 card px-5 py-2 ">

                @foreach ($audios as $aud)
                @if (auth()->user()->id === $aud->user->id)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                        <img src="{{ asset($aud->image) }}" alt="{{ $aud->title }}"
                            class="w-full h-full absolute inset-0 object-cover">
                        <audio class="js-player">
                            <source src="{{ $aud->file }}" />
                        </audio>
                        {{-- <img src="assets/images/icon-play.svg" class="w-12 h-12 uk-position-center" alt=""> --}}
                    </div>
                    <div class="flex-1 relative md:mt-0 mt-4">
                        <a href="#" class="text-xl font-semibold leading-6">{{ $aud->title }}</a>
                        {{-- <p class="leading-6 line-clamp-2 mt-2"> {!! $aud->content !!}</p> --}}
                        <div class="leading-6 line-clamp-2 mt-2">
                            {!! $aud->content !!}
                        </div>
                        <div class="font-semibold mt-2"> Minister: {{ $aud->author }} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div> {{ $aud->created_at->diffForHumans() }}</div>
                            <div>·</div>
                            <div> <a href="{{ route('audios.edit', $aud) }}"> <span class="icon-feather-edit "></span>
                                    Edit</a></div>
                            <div>·</div>
                            <div>
                                <form action="{{ route('audios.destroy', $aud) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                        <span class="icon-feather-trash-2"></span> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-opacity-75"> Nothing Here!</p>
                @endif
                @endforeach

            </div>

            {{ $audios->links() }}


        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


                <div class="border-b flex items-center justify-between  p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent Audio</h2>
                    </div>
                </div>

                <div class="p-3">

                    @foreach ($auds as $aud )
                    <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                        <a href="#" href="#" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                            <img src="{{ asset($aud->image) }}" class="absolute w-full h-full inset-0 "
                                alt="{{ $aud->title }}">
                        </a>
                        <div class="flex-1">
                            <audio class="js-player">
                                <source src="{{ $aud->file }}" />
                            </audio>
                            <a href="#" class="text-base font-semibold capitalize leading-6 line-clamp-1 mt-1">{{
                                $aud->title }}
                            </a>
                            <div class="text-sm text-gray-500 mt-0.5"> {{ $aud->views }} Streamed</div>
                        </div>

                    </div>
                    @endforeach


                </div>

                <a href="{{ route('audios.index') }}" class="border-t block text-center py-2"> See all </a>

            </div>
        </div>


    </div>
    @endif
    @endauth

    @guest
    <div class="lg:flex lg:space-x-10">

        <div class="lg:w-2/3">

            <!-- Clips -->

            <div class="my-5 flex justify-between pb-3">
                <h2 class="text-2xl font-semibold"> Top Audio Clips </h2>
            </div>

            <div class="divide-y -mt-3 card px-5 py-2 ">

                @foreach ($audios as $aud)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                        <img src="{{ asset($aud->image) }}" alt="{{ $aud->title }}"
                            class="w-full h-full absolute inset-0 object-cover">
                    </div>
                    <div class="flex-1 relative md:mt-0 mt-4">
                        <a href="#" class="text-xl font-semibold leading-6">{{ $aud->title }}</a>
                        <p class="leading-6 line-clamp-1 mt-2"> {!! $aud->content !!}</p>
                        <div class="font-semibold mt-2">Minister: {{ $aud->author }} </div>

                        <audio class="js-player">
                            <source src="{{ $aud->file }}" />
                        </audio>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div> {{ $aud->created_at->diffForHumans() }}</div>
                            <div>·</div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $audios->links() }}


        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


                <div class="border-b flex items-center justify-between  p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent Audio</h2>
                    </div>
                </div>

                <div class="p-3">

                    @foreach ($auds as $aud )
                    <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                        <a href="#" href="#" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                            <img src="{{ asset($aud->image) }}" class="absolute w-full h-full inset-0 "
                                alt="{{ $aud->title }}">
                        </a>
                        <div class="flex-1">
                            <a href="{{ $aud->file }}" class="text-base font-semibold capitalize"> {{ $aud->title }}
                            </a>
                            <div class="text-sm text-gray-500 mt-0.5"> {{ $aud->views }} played</div>
                        </div>
                        <a href="{{ $aud->file }}" download title="download {{ $aud->title }}"
                            class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                            <i class="icon-feather-arrow-down-circle"></i>
                        </a>

                    </div>
                    @endforeach


                </div>

                <a href="#" class="border-t block text-center py-2"> See all </a>

            </div>
        </div>


    </div>
    @endguest


</div>
</div>
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
            const player = Plyr.setup('.js-player');
        });
</script>
@endsection