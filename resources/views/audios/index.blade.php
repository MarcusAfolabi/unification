@extends('layouts.main')
@section('title', 'Audio clip')
@section('description', 'You can listen to all the audio clip both in music, sermon and worship chat to help your spirit man')
@section('keywords', 'You can listen to all the audio clip both in music, sermon and worship chat to help your spirit man')
@section('canonical', 'https://cnsunification.org/audios')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-audio" uk-toggle><i class="icon-material-outline-add"></i> Add New </a>
                </h5>
            </div>
        </div>
        @if (session('status')) <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status')}} </p>@endif
        <x-jet-validation-errors class="mb-4" />
        @if (auth()->user()->role==='admin')
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="audios" placeholder="Search for Audio and more.." autocomplete="off">
                </form>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-blue-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Title</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            URL</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Creator</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Views
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_audios as $key => $aud)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="#"> {{ $aud->title }} </a>
                                        </td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($aud->image) }}"> <img src="{{ asset($aud->image) }}" alt="{{ $aud->name }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ $aud->file }}" target="_blank">
                                                Open Url</a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $aud->user->name }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $aud->created_at->diffForHumans() }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('audios.edit', $aud) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                                            <div class="switches-list">
                                                <div class="switch-container">
                                                    @if($aud->status =='1')
                                                    <label class="switch"><a href="{{ url('/status', $aud) }}"><input type="checkbox" checked>
                                                            <span class="switch-button"></span>Active</a> </label>
                                                    @else
                                                    <label class="switch"> <a href="{{ url('/status', $aud) }}"><input type="checkbox">
                                                            <span class="switch-button"></span>InActive </a></label>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $aud->views }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('audios.destroy', $aud) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
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
                </div>
            </div>
        </div>
    </div>
    @elseif (auth()->user()->role==='member')
    <div class="lg:flex lg:space-x-10">
        <div class="lg:w-2/3">
            <div class="divide-y -mt-3 card px-5 py-2 ">
                @forelse ($audios as $aud)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                        <img src="{{ asset($aud->image) }}" alt="{{ $aud->title }}" class="w-full h-full absolute inset-0 object-cover">
                    <a href="{{asset($aud->file )}}"> <img src="assets/images/icon-play.svg" class="w-12 h-12 uk-position-center" alt="{{ $aud->title }}"> </a>
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
                @empty
                <p class="text-center text-opacity-75"> You currently do not have audio clips!</p>
                @endforelse
            </div>
        </div>
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">
                <div class="border-b flex items-center justify-between  p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Others Audio</h2>
                    </div>
                </div>
                <div class="p-3">
                    @forelse ($side_audios as $aud )
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
                    </div>
                    @empty
                    <a href="{{ route('audios.index') }}" class="border-t block text-center py-2"> Not avaliable </a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = Plyr.setup('.js-player');
    });
</script>
<div id="modal-audio" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New Audio</h2>
            <h5>You can add sermon, music, single track, worship session and other fellowship activities from here.</h5>
        </div>
        <form method="POST" action="{{ route('audios.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Title </span>
                </div>
                <div class="line">
                    <input class="line__input" id="author" name="author" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('author') }}" autocomplete="off">
                    <span for="author" class="line__placeholder"> Preacher/Composer/Artist Name </span>
                </div>
                <div uk-form-custom class="w-full py-3">
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" id="image" accept="image/*" name="image">
                    <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        Choose Audio Cover</a>
                </div>
                <div uk-form-custom class="w-full py-3">
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" id="file" accept="audio/*" name="file">
                    <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        Choose Audio File (mp3) 15MB Max</a>
                </div>
                <div class="line">
                    <input class="line__input" id="url" name="url" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ old('url') }}" autocomplete="off">
                    <span for="url" class="line__placeholder"> Audio URL - Must end with .mp3, else it'll fail</span>
                </div>
                
                <div class="line">
                    <textarea name="content" placeholder="Audio content" class="with-border px-3 py-3">
                    {{ old('content') }}</textarea>
                </div>
                <br>
                <br>
                <br>
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> Your Audio Is Subject to Review and Proof-reading. Ensure To Be
                    Accurate And Concise. </p>
                <button class="button blue" type="submit">SHARE</button>
            </div>
        </form>
    </div>
</div>
@endsection