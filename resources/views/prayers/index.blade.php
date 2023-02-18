@extends('layouts.main')@section('title', 'All Prayers')@section('description', 'This is all prayer
supplications')@section('keywords', 'praying hands, answering prayer, pray, bible')@section('canonical',
'https://cnsunification.org/prayers')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold"><a uk-tooltip="Add" href="#modal-prayer" uk-toggle><i class="icon-material-outline-add"></i>New Prayer </a></h5>
            </div>
        </div>
        <x-jet-validation-errors class="mb-4" />
        @if (session('status')) <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status')}}
        </p>@endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action=""><input type="text" class="form-control" name="prayers" placeholder="Search for Bible Study, Prayer and more.." autocomplete="off"></form>
            </div>
            <hr><br>
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
                                            Title</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Author</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Publication</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Category</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Creator</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Views</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prayers as $key=> $prayer) 
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">
                                            {{ ++$key}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('prayers.show', $prayer)}}" target="_blank">{{ $prayer->title}} </a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $prayer->author}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ date('l-d-M-Y', strtotime($prayer->publication))}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $prayer->category}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $prayer->user->name}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $prayer->created_at->diffForHumans()}}
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ route('prayers.edit', $prayer)}}"><span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                            <div class="switches-list">
                                                <div class="switch-container">@if($prayer->status=='1') <label class="switch"><a href="{{ url('/status', $prayer)}}"><input type="checkbox" checked><span class="switch-button"></span>Active</a></label>@else
                                                    <label class="switch"><a href="{{ url('/status', $prayer)}}"><input type="checkbox"><span class="switch-button"></span>InActive </a></label>@endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $prayer->views}} prayed
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('prayers.destroy', $prayer)}}" method="POST">
                                                @method('delete') @csrf <button type="submit" onclick="return confirm('Hey, Are you sure about this?');"><span class="icon-feather-trash-2"></span></button></form>
                                        </td>
                                    </tr>
                                    @empty <p class="text-center text-opacity-75">Nothing Here!</p>
                                    @endforelse </tbody>
                            </table>
                        </div>
                    </div>{{ $prayers->links()}}
                </div>
            </div>
        </div>
    </div> 
</div>
<div id="modal-prayer" uk-modal>
    <div class="uk-modal-dialog"> 
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Share prayer</h2>
            <h5>You can share   prayer points to members via this form</h5>
        </div> 
        <form method="POST" action="{{ route('prayers.store')}}" enctype="multipart/form-data">@csrf <div class="p-10 space-y-7">
                    <div class="line"><input class="line__input" required id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title')}}" autocomplete="off"><span for="title" class="line__placeholder">Title </span></div>@error('title') <p style="color: red; ">{{ $message}} </p>@enderror <div class="line"><input class="line__input" id="author" name="author" required type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('author')}}" autocomplete="off"><span for="title" class="line__placeholder">Anchor/Author </span></div>@error('author') <p style="color: red; ">{{ $message}} </p>@enderror 
                    <div class="line"><input class="line__input" required id="publication" name="publication" id="date" type="date" onkeyup="this.setAttribute('value', this.value);" value="{{ old('publication')}}" autocomplete="off"><span for="publication" class="line__placeholder">Date to Publish</span></div>@error('publication') <p style="color: red; ">{{ $message}} </p>@enderror <div class="form-group"><textarea name="content" required placeholder="Content" class="with-border px-3 py-3 ">{{ old('content')}}</textarea></div>
                    <div><label for="category">Category </label>
                    <select id="category" name="category" class="shadow-none selectpicker with-border " required>
                        <option value="">{{ old('category')}} </option>
                        <option value="Bible">Bible studies </option>
                        <option value="Prayer">Prayer points </option>
                    </select>
                </div>
                </div>
                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                    <p class="text-sm leading-6"> </p><button class="button blue" type="submit">PUBLISH</button>
                </div>
            </form>
    </div>
</div>
@endsection