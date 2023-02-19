@extends('layouts.main')
@section('title', 'All fellowship')
@section('description', 'This is all the fellowships of Unification Campus Fellowship')
@section('keywords', 'school, campus, schooling, student')
@section('canonical', 'https://cnsunification.org/fellowships')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-fellowship" uk-toggle><i class="icon-material-outline-add"></i> New
                        fellowship </a>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="fellowship" placeholder="Search your fellowship, Name and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($fellowships->count() > 0)
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
                                            Acronyms</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Campus</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Address</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Phone</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($fellowships as $key => $fellowship)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $fellowship->name }}

                                        </th>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $fellowship->acronyms }}
                                        </th>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <b><a target="_blank" href="{{route('fellowship.show', $fellowship->slug)}}">View Campus</a></b>
                                        </th>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $fellowship->address }}
                                        </th>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $fellowship->phone }}
                                        </th>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('fellowship.edit', $fellowship) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('fellowship.destroy', $fellowship) }}" method="POST">
                                                @csrf
                                                @method('delete')
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
                        <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                            Sorry, nothing to show</p>
                        @endif
                    </div>
                    {{ $fellowships->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-fellowship" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default m-3" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add Fellowship</h2>
        </div>

        <form method="POST" action="{{ route('fellowship.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" required name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Name Of Fellowship </span>
                </div>
                @error('name')
                <p style="color: red; ">{{ $message }} </p>
                @enderror

                <div class="line">
                    <input class="line__input" id="acronyms" required name="acronyms" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }}" autocomplete="off">
                    <span for="acronyms" class="line__placeholder"> Fellowship Acronym </span>
                </div>
                @error('acronyms')
                <p style="color: red; ">{{ $message }} </p>
                @enderror

                <div class="line">
                    <input class="line__input" id="phone" required name="phone" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('phone') }}" autocomplete="off">
                    <span for="phone" class="line__placeholder"> Fellowship Phone No </span>
                </div>
                @error('phone')
                <p style="color: red; ">{{ $message }} </p>
                @enderror

                <div class="line">
                    <input class="line__input" id="address" required name="address" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('address') }}" autocomplete="off">
                    <span for="address" class="line__placeholder"> Fellowship Address </span>
                </div>
                @error('address')
                <p style="color: red; ">{{ $message }} </p>
                @enderror

                <div class="line">
                    <input class="line__input" id="file" required name="logo" type="file" onkeyup="this.setAttribute('value', this.value);" value="{{ old('logo') }}" autocomplete="off">
                    <span for="logo" class="line__placeholder"> Fellowship Logo </span>
                </div>
                @error('logo')
                <p style="color: red; ">{{ $message }} </p>
                @enderror


            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                <p class="text-sm leading-6"> </p>
                <button class="button blue" type="submit">ADD</button>
            </div>

        </form>
    </div>
</div>
@endsection