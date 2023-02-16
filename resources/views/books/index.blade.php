@extends('layouts.main')
@section('title', 'Books')
@section('description', 'You can add books you have right to upload, free books, educational book, spiritual growth books, and relate fellowship libary books.')
@section('keywords', 'Book, Message, Audio Message, PDF')
@section('canonical', 'https://cnsunification.org/books')

@section('main')

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-book" uk-toggle><i class="icon-material-outline-add"></i> Add New </a>
                </h5>
            </div>
        </div>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        @if (auth()->user()->role==='admin')
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-5/6 space-y-5"> 
                <div class="card">
                    <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                    <div class="header_search"><i class="uil-search-alt"></i>
                        <form action="">
                            <input type="text" class="form-control" name="books" placeholder="Search for Book, Podcast and more.." autocomplete="off">
                        </form>
                    </div>
                    <hr>
                    <br>
                    @if ($books->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-blue">
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
                                    <th><a href="{{ asset($book->image) }}"> <img src="{{ asset($book->image) }}" alt="{{ $book->name }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>

                                    <td> <a href="{{ asset($book->file) }}" target="_blank">
                                            Open Book</a></td>
                                    <td>{{ $book->user->name }}</td>
                                    <td> {{ $book->created_at->diffForHumans() }}</td>
                                    <td> <a href="{{ route('books.edit', $book) }}"> <span class="icon-feather-edit "></span></a></td>
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
                                            <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
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

@elseif (auth()->user()->role==='member')
<div class="lg:flex lg:space-x-10">
    <div class="lg:w-2/3">
        <div class="divide-y -mt-3 card px-5 py-2 ">
            @forelse ($books as $book)
            <div class="flex sm:flex-row flex-col sm:space-x-4 py-4 relative w-full">
                <div class="sm:w-56 w-full h-32 overflow-hidden rounded-lg relative shadow-sm flex-shrink-0">
                    <img src="{{ asset($book->image) }}" alt="{{ $book->title }}" class="w-full h-full absolute inset-0 object-cover">
                </div>
                <div class="flex-1 relative md:mt-0 mt-4">
                    <a href="{{ asset($book->file) }}" class="text-xl font-semibold leading-6">{{ $book->title }}</a>
                    <div class="font-semibold mt-2"> Author: {{ $book->author }} </div>
                    <div class="flex space-x-2 items-center text-sm pt-1">
                        <div> {{ $book->created_at->diffForHumans() }}</div>
                        <div>·</div>
                        <a href="{{ route('books.edit', $book) }}"> <span class="icon-feather-edit "></span> Edit</a>
                        <div>·</div>
                        <a href="{{ route('books.edit', $book) }}"> <span class="icon-feather-arrow-down-circle"></span> {{ $book->view }}</a>
                         
                        <div>
                            <form action="{{ route('books.destroy', $book) }}" method="POST">
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
            <p class="text-center text-opacity-75"> You currently have no book in the store!</p>
            @endforelse

        </div>

    </div>

    <!-- Sidebar -->
    <div class="lg:w-1/3 w-full">
        <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


            <div class="border-b flex items-center justify-between  p-4">
                <div>
                    <h2 class="text-lg font-semibold">Others Book</h2>
                </div>
            </div>

            <div class="p-3">

                @forelse ($sidebooks as $book )
                <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50">
                    <a href="{{ asset($book->file) }}" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                        <img src="{{ asset($book->image) }}" class="absolute w-full h-full inset-0 " alt="{{ $book->title }}">
                    </a>
                    <div class="flex-1">
                        <a href="{{ asset($book->file) }}" class="text-base font-semibold capitalize"> {{ $book->title }}
                        </a>
                        <div class="text-sm text-blue-500 mt-0.5"> {{ $book->view }} downloads</div>
                    </div>
                    <a href="{{ asset($book->file) }}" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                        <span class="icon-material-outline-save-alt"></span>
                    </a>
                </div>
                @empty
            <a href="{{ route('books.index') }}" class="border-t block text-center py-2"> Nothing yet! </a>
                @endforelse 
            </div>


        </div>
    </div>


</div>
@endif

</div>
</div>
<div id="modal-book" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New Book</h2>
            <h5>You can add books you have right to upload, free books, educational book, spiritual growth books, and relate fellowship libary books.</h5>
        </div>
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Book Title </span>
                </div>
                <div class="line">
                    <input class="line__input" id="author" name="author" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('author') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Book Author </span>
                </div>
                <div class="grid lg:grid-cols-2 gap-3">
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="image" accept="image/*" name="image">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                          Cover Image</a>
                    </div>
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="file" accept="file/*" name="file">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                           File (PDF) 15MB Max</a>
                    </div>
                </div>
            </div>

            <!-- form footer -->
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> Your Book Is Subject to Review and Proof-reading. Ensure To Be
                    Accurate And Concise. </p>
                <button class="button blue" type="submit">PUBLISH</button>
            </div>

        </form>

    </div>
</div>
@endsection