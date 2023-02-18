@extends('layouts.main')
@section('title', 'All Resources')
@section('description', 'This is all resources from Central Executives Council For Unification Campus Fellowship')
@section('keywords', 'resources, books, audio, pdf, product, buying product, items, amazon, shop, shopping, shoprite, justrite, ikeja mall, allen avenue mall,
ecommerce, facebook, facebook shop, shop, buyers, sellers, small business, enterprise')
@section('canonical', 'https://cnsunification.org/resource')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-resource" uk-toggle><i class="icon-material-outline-add"></i> New Resource </a>
                </h5>
            </div>
        </div>
        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="search" autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Name</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            File</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($resources as $key => $resource)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ asset($resource->file) }}"> {{ $resource->name }}
                                            </a>
                                        </th>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                             
                                            <a href="{{ asset($resource->file) }}" title="download" > <i class="icon-feather-image"></i> download</a>
                                        </th>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('resource.edit', $resource) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('resource.destroy', $resource) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Sorry, nothing to show</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-resource" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><i class="icon-material-outline-add"></i> Resource</h2>
            <h5>Add all Central resources here! PDF, DOCS, JPEG or PNG are allowed</h5>
        </div>
        <form method="POST" action="{{ route('resource.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Name </span>
                </div>

                <div uk-form-custom class="w-full py-3">
                    <label>File</label>
                    <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" id="file" name="file">
                    <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        PDF, DOCS, JPEG or PNG</a>
                </div>
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <button class="button blue" type="submit">SHARE</button>
            </div>

        </form>
    </div>
</div>

@endsection