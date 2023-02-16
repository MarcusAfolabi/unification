@extends('layouts.main')
@section('title', 'Recap of the Recent Fellowship Activities')
@section('description', 'Join us as we reflect on the highlights of the recent Cherubim and Seraphim Church Unification Campus Fellowship Convention. Read about the inspiring talks, powerful worship sessions, and meaningful connections made with fellow members.')
@section('keywords', 'Cherubim and Seraphim Church Unification Campus Fellowship, Fellowship Convention, Recap, Inspiring Talks, Worship Sessions, Meaningful Connections, Church Members')
@section('canonical', 'https://cnsunification.org/post')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <x-jet-validation-errors class="mb-4" />

        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-post" uk-toggle><i class="icon-material-outline-add"></i> Add New </a>
                </h5>
            </div>
        </div>
        @if(auth()->user()->role === 'admin' )
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="search" placeholder="Search your Post, Content and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($all_posts->count() > 0)
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
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Title</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Category</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Intro</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Creator</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Views</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_posts as $key => $post)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="{{ $post->title }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""> </th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $post->category }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $post->intro }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('user.index', $post->user->id) }}">
                                                {{ $post->user->name }} </a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $post->created_at->diffForHumans() }}</td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('posts.edit', $post) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $post->views }} read
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                            Sorry, nothing to show</p>
                        @endif
                    </div>
                    {{ $all_posts->links() }}
                </div>
            </div>
        </div>
        @endif
        @if(auth()->user()->role === 'member' )
        <div class="lg:flex  lg:space-x-12"> 
            <div class="lg:w-3/4">
                <div class="card divide-y divide-blue-100 px-4">
                    @foreach ($myposts as $post)
                    <div class="lg:flex lg:space-x-6 py-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <div class="lg:w-60 w-full h-40 overflow-hidden rounded-lg relative shadow-sm">
                                @if ($post->images)
                                <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="w-full h-full absolute inset-0 object-cover">
                                @endif
                                <div class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                    {{ $post->category }}
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 lg:pt-0 pt-4">

                            <a href="{{ route('posts.show', $post) }}" class="text-xl font-semibold line-clamp-2">
                                {{ $post->title }}</a>
                            <div class="border-b blue:border-blue-700 leading-6 line-clamp-2 mt-5">

                                {{ $post->intro  }}
                            </div>
                            <div class="flex items-center pt-3">
                                <div class="flex items-center"> <a href="{{ route('posts.edit', $post) }}"> <span class="icon-feather-edit "></span></a></td>
                                </div>
                                <div class="flex items-center mx-4">

                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                            <span class="icon-feather-trash-2"></span> </button>

                                    </form>
                                </div>
                                <div class="flex items-center">
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach



                </div>
                <br>
                {{ $myposts->links() }}


            </div>
            <div class="lg:w-1/4 w-full flex-shrink-0">

                <div uk-sticky="offset:100" class="uk-sticky">
                    <h4 class="text-lg font-semibold mb-3"> Recommended Products </h4>
                    <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                        @forelse ($sideproducts as $sideproduct)
                        <a href="{{ route('products.show', $sideproduct) }}">
                            <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                                <img src="{{ asset($sideproduct->image) }}" class="w-9 h-9 mr-3" alt="">
                                <p class="line-clamp-1 mt-2 leading-6"> <strong> {{ $sideproduct->name }} </strong> for
                                    <strong> {{ $sideproduct->currency }}{{ number_format($sideproduct->price) }}
                                    </strong>
                                </p>
                            </div>
                        </a>
                        @empty
                        <a href="{{ route('products.create') }}">
                            <h4 class="text-lg font-semibold mb-3"> You can add your first product </h4>
                        </a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div id="modal-post" uk-modal>
    <div class="uk-modal-dialog"> 
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New Story</h2>
            <h5>You can add pictures - (upto 5), Anniversary events and other fellowship activities from here.</h5>
        </div> 
        <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">@csrf <div class="p-10 space-y-7">
                <div class="line"><input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title')}}" autocomplete="off"><span for="title" class="line__placeholder">Title </span></div> <div class="line"><input class="line__input" id="intro" name="intro" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('intro')}}" autocomplete="off"><span for="intro" class="line__placeholder">Intro </span></div>
                <input class="with-border" hidden name="fellowship_id" value="{{ auth()->user()->fellowship_id }}">
                <div uk-form-custom class="w-full py-3">
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg></div><input type="file" id="image" accept="image/*" multiple name="image[]"><a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">Images 5 max </a>
                </div><div><label for="category">Category </label><select id="category" name="category" class="shadow-none selectpicker with-border " required>
                        <option value="">{{ old('category')}} </option>
                        <option value="Anniversary">Annual Anniversary </option>
                        <option value="Fellowship">Fellowship Activities </option>
                        @if(auth()->user()->role==='admin') <option value="CEC">CEC News</option>@endif
                    </select></div> <div class="form-group">
                    <textarea name="content" id="content" class="with-border px-3 py-3" placeholder="Content">{{ old('content')}}</textarea>
                </div>
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6">Your Post Is Subject to Review and Proof-reading. Ensure To Be Accurate And Concise. </p><button class="button blue" type="submit">PUBLISH</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.Add(document.querySelector('#content')).then(content => {
        console.log(content);
    }).catch(error => {
        console.error(error);
    });
</script>
@endsection