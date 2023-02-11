@extends('layouts.main')
@section('title', 'All Resources')
@section('description', 'This is all resources from Central Executives Council For Unification Campus Fellowship')
@section('keywords', 'resources, books, audio, pdf, product, buying product, items, amazon, shop, shopping, shoprite, justrite, ikeja mall, allen avenue mall,
ecommerce, facebook, facebook shop, shop, buyers, sellers, small business, enterprise')
@section('canonical', 'https://cnsunification.org/products')

@section('main')
<div class="main_content">
    <div class="mcontainer">
@auth

@if(auth()->user()->role === 'admin' )
<!--  breadcrumb -->
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('resource.create') }}"><i class="icon-material-outline-add"></i> New Resource </a>
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
                    <input type="text" class="form-control" name="search"
                        placeholder="Search your Post, Content and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($resources->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Name</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            File</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($resources as $key => $resource)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ asset($resource->file) }}"> {{ $resource->name }}
                                            </a>
                                        </th>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <img src="{{ asset($resource->file) }}" style="height:50px; width:50px">
                                            <a href="{{ asset($resource->file) }}">  </a>
                                        </th>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('resource.edit', $resource) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('resource.destroy', $resource) }}" method="POST">
                                                @csrf
                                                @method('delete')
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
                        <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                            Sorry, nothing to show</p>
                        @endif
                    </div>
                    {{ $resources->links() }}

                </div>
            </div>

        </div>

        @elseif(auth()->user()->role === 'member' )
        <div class="lg:flex  lg:space-x-12">

            <div class="lg:w-3/4">



                <div class="card divide-y divide-gray-100 px-4">
                    @foreach ($resources as $resource)
                    <div class="lg:flex lg:space-x-6 py-5">
                        <a href="{{ route('resource.show', $resource) }}">
                            <div class="lg:w-60 w-full h-40 overflow-hidden rounded-lg relative shadow-sm">
                                <img src="{{ asset($resource->file) }}" alt="{{ $resource->name }}"
                                    class="w-full h-full absolute inset-0 object-cover">
                                <div
                                    class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                    {{ $resource->name }}
                                </div>
                            </div>
                        </a>
                        <div class="flex-1 lg:pt-0 pt-4">

                            <a href="{{ route('resource.show', $resource) }}"
                                class="text-xl font-semibold line-clamp-2">
                                {{ $resource->name }}</a>
                            {{-- <p class="leading-6 line-clamp-2 mt-2"> {!! $resource->fullDescription !!}</p> --}}
                            <div class="border-b dark:border-gray-700 leading-6 line-clamp-2 mt-5">

                                {{ $resource->name }}
                            </div>
                            <div class="flex items-center pt-3">
                                <div class="flex items-center"> <a href="{{ asset($resource->file) }}"
                                        download="{{ asset($resource->file) }}"> <span
                                            class="icon-feather-download "></span></a></td>
                                </div>


                            </div>

                        </div>
                    </div>
                    @endforeach



                </div>
                <br>
                {{ $resources->links() }}


            </div>
            <div class="lg:w-1/4 w-full flex-shrink-0">

                <div uk-sticky="offset:100" class="uk-sticky">

                    <h2 class="text-lg font-semibold mb-3"> Similar Posts </h2>
                    <ul>
                        @foreach ($sideposts as $sidepost )
                        <li>
                            <a href="{{route('posts.show', $sidepost)}}"
                                class="hover:bg-gray-100 rounded-md p-2 -mx-2 block">
                                <h3 class="font-medium line-clamp-1 mt-1"> {{ $sidepost->postTitle }} </h3>
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
                            <div class="-mx-2 duration-300 flex hover:bg-gray-50 px-2 py-2 rounded-md">
                                <img src="{{ asset($sideproduct->image) }}" class="w-9 h-9 mr-3" alt="">
                                <p class="line-clamp-1 mt-2 leading-6"> <strong> {{ $sideproduct->name }} </strong> for
                                    <strong> {{ $sideproduct->currency }}{{ number_format($sideproduct->price, 2) }}
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
        @endauth
    </div>
</div>

@endsection
