@extends('layouts.main')
@section('title', 'All Post')
@section('description', 'This is all Post')
@section('keywords', 'blog, posts, bloging, wordpress')
@section('canonical', 'https://cnsunification.org/posts')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('posts.create') }}"><i class="icon-material-outline-add"></i> New Post </a>
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
            @if ($posts->count() > 0)
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
                                    @foreach ($posts as $key => $post)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($post->image) }}"> <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $post->category }}</td>
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
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                                            <div class="switches-list">
                                                <div class="switch-container">
                                                    @if($post->status =='1')
                                                    <label class="switch"><a href="{{ url('/status', $post) }}"><input type="checkbox" checked>
                                                            <span class="switch-button"></span>Active</a> </label>
                                                    @else
                                                    <label class="switch"> <a href="{{ url('/status', $post) }}"><input type="checkbox">
                                                            <span class="switch-button"></span>InActive </a></label>
                                                    @endif
                                                </div>
                                            </div>
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
                    {{ $posts->links() }}

                </div>
            </div>
        </div>
        @(auth()->user()->role === 'member' )
        <div class="lg:flex  lg:space-x-12">

            <div class="lg:w-3/4">

                <div class="flex justify-between items-center relative md:mb-4 mb-3">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold"> My Post </h2>

                    </div>
                    <a href="{{ route('posts.create') }}" class="flex items-center justify-center h-10 w-10 z-10 rounded-full bg-blue-600 text-white absolute right-0" data-tippy-placement="left" title="Create New Article">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>

                <div class="card divide-y divide-blue-100 px-4">
                    @foreach ($posts as $post)
                    <div class="lg:flex lg:space-x-6 py-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <div class="lg:w-60 w-full h-40 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full absolute inset-0 object-cover">
                                <div class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                    {{ $post->category }}
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 lg:pt-0 pt-4">

                            <a href="{{ route('posts.show', $post) }}" class="text-xl font-semibold line-clamp-2">
                                {{ $post->title }}</a>
                            <div class="border-b dark:border-blue-700 leading-6 line-clamp-2 mt-5">

                                {!! $post->content !!}
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
                {{ $posts->links() }}


            </div>
            <div class="lg:w-1/4 w-full flex-shrink-0">

                <div uk-sticky="offset:100" class="uk-sticky">

                    <h2 class="text-lg font-semibold mb-3"> Similar Posts </h2>
                    <ul>
                        @foreach ($sideposts as $sidepost )
                        <li>
                            <a href="{{route('posts.show', $sidepost)}}" class="hover:bg-blue-100 rounded-md p-2 -mx-2 block">
                                <h3 class="font-medium line-clamp-2"> {{ $sidepost->title }} </h3>
                                <div class="flex items-center my-auto text-xs space-x-1.5">
                                    <div> {{ $sidepost->created_at->diffForHumans() }}</div>
                                    <div class="pb-1"> . </div>
                                    <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                    <div> {{ $sidepost->views }} views</div>
                                </div>
                            </a>
                        </li>
                        @endforeach


                    </ul>
                    <br>

                    <h4 class="text-lg font-semibold mb-3"> Recommended Products </h4>

                    <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                        {{-- <h3 class="text-line-through font-semibold mb-1"> Other Products </h3> --}}
                        @foreach ($sideproducts as $sideproduct)
                        <a href="{{ route('products.show', $sideproduct) }}">
                            <div class="-mx-2 duration-300 flex hover:bg-blue-50 px-2 py-2 rounded-md">
                                <img src="{{ asset($sideproduct->image) }}" class="w-9 h-9 mr-3" alt="">
                                <p class="line-clamp-1 mt-2 leading-6"> <strong> {{ $sideproduct->name }} </strong> for
                                    <strong> {{ $sideproduct->currency }}{{ number_format($sideproduct->price) }}
                                    </strong>

                                </p>
                            </div>
                        </a>
                        @endforeach

                    </div>
                    <a href="{{ route('products.index') }}" class="hover:text-blue-600 hover:underline"> See All </a>


                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection