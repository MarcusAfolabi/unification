@extends('layouts.main')
@section('title', 'Meet the Central Executives Council')
@section('description', 'This is all CEC, read their profile below')
@section('keywords', 'Executives, Position, President, Speech')
@section('canonical', 'https://cnsunification.org/executives')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="#modal-council" uk-toggle><i class="icon-material-outline-add"></i> New Exective
                    </a>
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
                    <input type="text" class="form-control" name="executive" placeholder="Search for Names, Position and more.." autocomplete="off">
                </form>
            </div>
            <br>
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
                                            FirstName</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Email</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Hobbies</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Position Held</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($executives as $key => $executive)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('executives.index') }}">
                                                {{ $executive->name }} </a>
                                        </td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($executive->image) }}"> <img src="{{ asset($executive->image) }}" alt="{{ $executive->name }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="mailto:{{ $executive->email }}">{{ $executive->email }}</a>
                                        </td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $executive->hobby }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $executive->position }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('executives.edit', $executive) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('executives.destroy', $executive) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Nobody has showed up</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $executives->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-council" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New CEC Member</h2>
        </div>
        <form method="POST" action="{{ route('executives.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Full Name </span>
                </div>
                <div class="line">
                    <input class="line__input" id="author" name="position" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('position') }}" autocomplete="off">
                    <span for="position" class="line__placeholder"> Position </span>
                </div>
                <div class="line">
                    <input class="line__input" id="email" name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}" autocomplete="off">
                    <span for="email" class="line__placeholder"> Email </span>
                </div>
                <div class="line">
                    <input class="line__input" id="hobby" name="hobby" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('hobby') }}" autocomplete="off">
                    <span for="hobby" class="line__placeholder"> Hobbies </span>
                </div>
                <div uk-form-custom class="w-full py-3">
                    <div class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-gray-800 blue:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <input type="file" id="image" accept="image/*" name="image">
                    <a href="#" class="bg-gray-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                        Choose Profile Image</a>
                </div>
                <div class="form-group">
                    <textarea name="profile" id="profile" placeholder="Profile Data" class="with-border py-4 px-4">
                    {{ old('profile') }}</textarea>
                </div>
                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                    <button class="button blue" type="submit">SAVE</button>
                </div>
        </form>
    </div>
</div>
@endsection
