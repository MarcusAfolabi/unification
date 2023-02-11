@extends('layouts.main')
@section('title', 'All Resources')
@section('description', 'This is all resources from Central Executives Council For Unification Campus Fellowship')
@section('keywords', 'resources, books, audio, pdf, product, buying product, items, amazon, shop, shopping, shoprite, justrite, ikeja mall, allen avenue mall,
ecommerce, facebook, facebook shop, shop, buyers, sellers, small business, enterprise')
@section('canonical', 'https://cnsunification.org/products')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('resource.create') }}"><i class="icon-material-outline-add"></i> New Resource </a>
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
        @endauth
    </div>
</div>

@endsection
