@extends('layouts.main')
@section('title', 'All Your Books')
@section('description', 'This is all Book')
@section('keywords', 'Book, Message, Audio Message, PDF')
@section('canonical', 'https://cnsunification.org/books')

@section('main')

    <div class="main_content">
        <div class="mcontainer">

    <!--  breadcrumb -->
    @auth
    @if (auth()->user()->isAdmin())

    <div class="breadcrumb-area py-0">
        <div class="breadcrumb">
            <ul class="m-0">
                <li>
                    <a href="{{ route('books.index') }}">All Book</a>
                </li>
                <li class="active">
                    <a href="{{ route('books.create') }}">Create New Book </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="lg:flex lg:space-x-10">

            <div class="lg:w-5/6 space-y-5">
                @if (session('status'))
                    <p class="bg-red-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif

                    <div class="card">
                        <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                        <div class="header_search"><i class="uil-search-alt"></i>
                            <form action="">
                                <input type="text" class="form-control" name="books"
                                    placeholder="Search for Book, Podcast and more.." autocomplete="off">
                            </form>
                        </div>
                        <hr>
                        <br>
                        @if ($books->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Creator</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <th scope="row">#{{ $book->id }}</th>
                                                <td> <a href="#"> {{ $book->title }} </a>
                                                </td>
                                                <th><a href="{{ asset($book->image) }}"> <img src="{{ asset($book->image) }}"
                                                            alt="{{ $book->name }}" class="rounded-lg"
                                                            style="max-height: 50px; max-width:50px" srcset=""></a></th>

                                                <td> <a href="{{ asset($book->file) }}" target="_blank">
                                                        Open Book</a></td>
                                                <td>{{ $book->user->name }}</td>
                                                <td> {{ $book->created_at->diffForHumans() }}</td>
                                                <td> <a href="{{ route('books.edit', $book) }}"> <span
                                                            class="icon-feather-edit "></span></a></td>
                                                <td>
                                                    @if ($book->status == 1)
                                                        <a href="">published </a>
                                                    @elseif ($book->status == 0)
                                                        <a href="">pending</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Hey, Are you sure about this?');">
                                                            <span class="icon-feather-trash-2"></span> </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-opacity-75"> Nothing Here!</p>
                        @endif
                    </div>
                    {{$books->links()}}
        </div>
    </div>
</div>
</div>

    @elseif (!auth()->user()->isAdmin())
    <div class="lg:flex lg:space-x-10">

        <div class="lg:w-2/3">

            <!-- Clips -->

            <div class="my-5 flex justify-between pb-3">
                <h2 class="text-2xl font-semibold"> My Book </h2>
            </div>
            <div class="flex justify-between items-center relative md:mb-4 mb-3">

            <a href="{{ route('books.create') }}"
                            class="flex items-center justify-center h-10 w-10 z-10 rounded-full bg-blue-600 text-white absolute right-0"
                            data-tippy-placement="left" title="Create New Book">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
            </div>

            <div class="divide-y -mt-3 card px-5 py-2 ">

                @foreach ($books as $book)
                @if (auth()->user()->id === $book->user->id)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                        <img src="{{ asset($book->image) }}" alt="{{ $book->title }}"
                            class="w-full h-full absolute inset-0 object-cover">
                    </div>
                    <div class="flex-1 relative md:mt-0 mt-4">
                        {{-- <a href="" class="text-xl font-semibold leading-6">{{ $book->title }}</a> --}}
                        <a href="{{ asset($book->file) }}" class="text-xl font-semibold leading-6">{{ $book->title }}</a>
                        <div class="font-semibold mt-2"> Minister: {{ $book->author }} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div> {{ $book->created_at->diffForHumans() }}</div>
                            <div>·</div>
                        <a href="{{ route('books.edit', $book) }}"> <span
                                class="icon-feather-edit "></span> Edit</a>
                                <div>·</div>
                                <div> <form action="{{ route('books.destroy', $book) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('Hey, Are you sure about this?');">
                                        <span class="icon-feather-trash-2"></span> Delete</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>

        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


                <div class="border-b flex items-center justify-between  p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent Book</h2>
                    </div>
                </div>

                <div class="p-3">

                   @foreach ($sidebooks as $book )
                   <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                    <a href="{{ asset($book->file) }}" iv
                        class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                        <img src="{{ asset($book->image) }}" class="absolute w-full h-full inset-0 " alt="{{ $book->title }}">
                    </a>
                    <div class="flex-1">
                        <a href="{{ asset($book->file) }}" class="text-base font-semibold capitalize"> {{ $book->title }}
                        </a>
                        <div class="text-sm text-gray-500 mt-0.5"> 845K Following</div>
                    </div>
                    <a href="{{ asset($book->file) }}"
                        class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                        <span class="icon-material-outline-save-alt"></span>
                    </a>
                </div>
                   @endforeach


                </div>

                <a href="{{ route('books.index') }}" class="border-t block text-center py-2"> See all </a>

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
                <h2 class="text-2xl font-semibold"> Top Books </h2>
            </div>

            <div class="divide-y -mt-3 card px-5 py-2 ">

                @foreach ($books as $book)
                <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                    <a href="{{ asset($book->file) }}">   <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                       <img src="{{ asset($book->image) }}" alt="{{ $book->title }}"
                            class="w-full h-full absolute inset-0 object-cover">
                    </div>
                </a>
                    <div class="flex-1 relative md:mt-0 mt-4">
                        <a href="{{ asset($book->file) }}" class="text-xl font-semibold leading-6">{{ $book->title }}</a>
                         <div class="font-semibold mt-2">Minister: {{ $book->author }} </div>
                        <div class="flex space-x-2 items-center text-sm pt-1">
                            <div> {{ $book->created_at->diffForHumans() }}</div>
                            <div>·</div>
                            <div> 156.9K views</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3 w-full">
            <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


                <div class="border-b flex items-center justify-between  p-4">
                    <div>
                        <h2 class="text-lg font-semibold">Recent Book</h2>
                    </div>
                </div>

                <div class="p-3">

                   @foreach ($sidebooks as $book )
                   <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                    <a href="{{ asset($book->file) }}"  iv
                        class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                        <img src="{{ asset($book->image) }}" class="absolute w-full h-full inset-0 " alt="{{ $book->title }}">
                    </a>
                    <div class="flex-1">
                        <a href="{{ asset($book->file) }}" class="text-base font-semibold capitalize">{{ $book->title }}
                        </a>
                        <div class="text-sm text-gray-500 mt-0.5"> 845K Following</div>
                    </div>
                    <a href="{{ asset($book->image) }}"
                        class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                        <span class="icon-material-outline-save-alt"></span>
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
@endsection
