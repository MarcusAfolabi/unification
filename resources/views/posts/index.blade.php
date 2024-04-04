@extends('layouts.main')
@section('title', 'Recap of the Recent Fellowship Activities')
@section('description',
    'Join us as we reflect on the highlights of the recent Cherubim and Seraphim Church Unification
    Campus Fellowship Convention. Read about the inspiring talks, powerful worship sessions, and meaningful connections made
    with fellow members.')
@section('keywords',
    'Cherubim and Seraphim Church Unification Campus Fellowship, Fellowship Convention, Recap,
    Inspiring Talks, Worship Sessions, Meaningful Connections, Church Members')
@section('canonical', 'https://cnsunification.org/post')
@section('main')
    <div class="main_content">
        <div class="mcontainer">
            @if (session('status'))
                <p class="relative p-4 text-center text-white bg-blue-500 border rounded-md uk-alert">
                    {{ session('status') }}
                </p>
            @endif
            <x-jet-validation-errors class="mb-4" />
            <div class="relative flex items-center justify-between mb-3 md:mb-4">
                <div class="flex-1">
                    <h5 class="font-semibold text-1xl">
                        <button class='px-3 py-3 bg-red-500 rounded-xl'><i class="icon-material-outline-add"></i> Add New
                        </button>
                    </h5>
                </div>
            </div>
            {{-- @livewire('create-post') --}}
            <form wire:submit.prevent='CreatePost'>
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input wire:model.lazy="title" class="line__input" maxlength="100" type="text">
                        <span for="title" class="line__placeholder">Caption</span>
                    </div>
                    @error('title')
                        <em class="mb-4 text-red-500">{{ $message }}</em>
                    @enderror
                    <div uk-form-custom class="w-full py-3">
                        <div
                            class="relative flex flex-col items-center justify-center w-full h-32 bg-blue-100 border-2 border-dashed rounded-lg blue:bg-blue-800 blue:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input wire:model.lazy='images' type="file" accept="image/*" name="image[]" multiple="multiple"
                            max="4"><a href="#"
                            class="flex items-center justify-center px-5 font-medium text-white text-blue-600 bg-blue-200 h-9 rounded-b-xl uk-position-bottom uk-transition-bottom-small">Images
                            4 max </a>
                    </div>
                    @error('images')
                        <em class="mb-4 text-red-500">{{ $message }}</em>
                    @enderror
                    <div>
                        <label for="category">Category </label>
                        <select wire:model.lazy="category" name="category" class="shadow-none selectpicker with-border">
                            <option value="">{{ old('category') }} </option>
                            <option value="Anniversary">Annual Anniversary </option>
                            <option value="Fellowship">Fellowship Activities </option>
                            @if (auth()->user()->role === 'admin')
                                <option value="CEC">CEC News</option>
                            @endif
                        </select>
                    </div>
                    @error('category')
                        <em class="mb-4 text-red-500">{{ $message }}</em>
                    @enderror
                    <div class="form-group">
                        <textarea wire:model.defer="content" name="content" id="content" class="px-3 py-3 with-border"
                            placeholder="Enter description"></textarea>
                    </div>
                    @error('content')
                        <em class="mb-4 text-red-500">{{ $message }}</em>
                    @enderror

                </div>
                <div class="flex justify-between border-t lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                    <p class="text-sm leading-6 text-green-700">Your Post Is Subject to Review and Proof-reading. Ensure To
                        Be Accurate And Concise.</p>

                    <button wire:loading.attr="disabled" class="button blue" type="submit">
                        <span wire:loading.remove>PUBLISH</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>

            </form>
            {{-- @if (auth()->user()->role === 'admin')
                <div class="card">
                    <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                    <div class="header_search"><i class="uil-search-alt"></i>
                        <form action="">
                            <input type="text" class="form-control" name="search"
                                placeholder="Search your Post, Content and more.." autocomplete="off">
                        </form>
                    </div>
                    <hr>
                    @if ($all_posts->count() > 0)
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full">
                                            <thead class="border-b bg-blue-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        S/No</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Image</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Title</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Category</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Creator</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Date</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Edit</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Delete</th>
                                                    <th scope="col"
                                                        class="px-6 py-4 text-sm font-medium text-left text-blue-900">
                                                        Views</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($all_posts as $key => $post)
                                                    <tr class="border-b">
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-blue-900 whitespace-nowrap">
                                                            {{ ++$key }}</td>
                                                        <th
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            <img src="{{ asset('storage/' . $post->images->first()->path) }}"
                                                                alt="{{ $post->title }}" class="rounded-lg"
                                                                style="max-height: 50px; max-width:50px" srcset="">
                                                        </th>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            <a
                                                                href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            {{ $post->category }}</td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            <a href="{{ route('user.index', $post->user->id) }}">
                                                                {{ $post->user->name }} </a>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            {{ $post->created_at->diffForHumans() }}</td>

                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            <a href="{{ route('posts.edit', $post) }}"> <span
                                                                    class="icon-feather-edit "></span></a>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            <form action="{{ route('posts.destroy', $post) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                                    <span class="icon-feather-trash-2"></span> </button>
                                                            </form>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-light text-blue-900 whitespace-nowrap">
                                                            {{ $post->views }} read
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center text-opacity-75"> <span
                                            class="icon-material-outline-user"></span>
                                        Sorry, nothing to show</p>
                    @endif
                </div>
                {{ $all_posts->links() }}
            @elseif (auth()->user()->role === 'member')
                <div class="lg:flex lg:space-x-12">
                    <div class="lg:w-3/4">
                        <div class="px-4 divide-y divide-blue-100 card">
                            @foreach ($myposts as $post)
                                <div class="py-5 lg:flex lg:space-x-6">
                                    <a href="{{ route('posts.show', $post) }}">
                                        <div class="relative w-full h-40 overflow-hidden rounded-lg shadow-sm lg:w-60">
                                            @if ($post->images)
                                                <img src="{{ asset('storage/' . $post->images->first()->path) }}"
                                                    alt="{{ $post->title }}" title="{{ $post->title }}"
                                                    class="absolute inset-0 object-cover w-full h-full">
                                            @endif
                                            <div
                                                class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                                {{ $post->category }}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="flex-1 pt-4 lg:pt-0">

                                        <a href="{{ route('posts.show', $post) }}"
                                            class="text-xl font-semibold line-clamp-2">
                                            {{ $post->title }}</a>
                                        <div class="mt-5 leading-6 border-b blue:border-blue-700 line-clamp-2">

                                            {{ $post->intro }}
                                        </div>
                                        <div class="flex items-center pt-3">
                                            <div class="flex items-center"> <a href="{{ route('posts.edit', $post) }}">
                                                    <span class="icon-feather-edit "></span></a></td>
                                            </div>
                                            <div class="flex items-center mx-4">

                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Hey, Are you sure about this?');">
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
                    <div class="flex-shrink-0 w-full lg:w-1/4">
                        <div uk-sticky="offset:100" class="uk-sticky">
                            <h4 class="mb-3 text-lg font-semibold"> Recommended Products </h4>
                            <div class="px-4 py-3 mb-5 bg-white rounded-md shadow">
                                @forelse ($sideproducts as $sideproduct)
                                    <a href="{{ route('products.show', $sideproduct) }}">
                                        <div class="flex px-2 py-2 -mx-2 duration-300 rounded-md hover:bg-blue-50">
                                            <img src="{{ asset($sideproduct->image) }}" class="mr-3 w-9 h-9"
                                                alt="">
                                            <p class="mt-2 leading-6 line-clamp-1"> <strong> {{ $sideproduct->name }}
                                                </strong>
                                                for
                                                <strong>
                                                    {{ $sideproduct->currency }}{{ number_format($sideproduct->price) }}
                                                </strong>
                                            </p>
                                        </div>
                                    </a>
                                @empty
                                    <a href="{{ route('products.create') }}">
                                        <h4 class="mb-3 text-lg font-semibold"> You can add your first product </h4>
                                    </a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
@endsection
