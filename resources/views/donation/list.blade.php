@extends('layouts.main')
@section('title', 'Donation list')
@section('description', 'These are the list of donation from people')
@section('main')
<script src="https://checkout.flutterwave.com/v3.js"></script>

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">

                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-donation" uk-toggle><i class="icon-material-outline-add"></i> New
                    </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md">
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="fundraise" placeholder="Search for title and target..." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($fundraises->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Title</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Target</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Description</th> 
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            When</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($fundraises as $key => $fundraise)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> 
                                                <img src="{{
                                            asset('storage' . $fundraise->image) }}" width="50px" height="50px"> </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{route('fundraise.show', $fundraise)}}" target="_blank">
                                                {{ $fundraise->title }} </a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> N{{ number_format($fundraise->target, 2) }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $fundraise->description }} </td>
                                       
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $fundraise->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> Nothing Here!</p>
                        @endif
                    </div>
                </div>
            </div>
            {{ $fundraises->links() }}
        </div>
    </div>
</div>
<div id="modal-donation" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add Donation</h2>
        </div>
        
        <form method="POST" action="{{ route('fundraise.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="title" required name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Title </span>
                </div>

                <div class="line">
                    <input class="line__input" id="target" required name="target" type="number" onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }}" autocomplete="off">
                    <span for="target" class="line__placeholder"> Amount to raise </span>
                </div>

                <div class="line">
                    <input class="line__input" id="image" required name="image" type="file" onkeyup="this.setAttribute('value', this.value);" value="{{ old('address') }}" autocomplete="off">
                    <span for="image" class="line__placeholder"> Image </span>
                </div>

                <div class="line">
                    <textarea class="line__input" id="description" required name="description" type="text" onkeyup="this.setAttribute('value', this.value);" value="+234{{ old('phone') }}" autocomplete="off"></textarea>
                    <span for="description" class="line__placeholder"> Description </span>
                </div>
                <br>
                <br> 
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                <p class="text-sm leading-6"> </p>
                <button class="button blue" type="submit">ADD</button>                
            </div>
        </form>
    </div>
</div>
@endsection