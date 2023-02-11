@extends('layouts.main')
@section('title', 'Unit')
@section('main')

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold">
                    All unit
                </h2>
            </div>
            <a uk-tooltip="Add" href="#modal-example" uk-toggle
                class="flex items-center justify-center h-8 lg:px-3 px-2 rounded-md bg-red-600 text-white space-x-1 absolute right-0 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd"></path>
                </svg> <span class="md:block hidden"> Add</span>
            </a>
        </div>
        <div class="card">
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="search"
                        placeholder="Search by Unit name, categories.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            <x-jet-validation-errors class="alert alert-danger" />
            @if (session('status'))
            <div class="bg-whit border-t-4 border-red-600 p-5 shadow-lg relative rounded-md" uk-alert>
                {{ session('status') }}
            </div>
            @endif
            @if ($units->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-slate-400">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">S/N
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            View
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">Edit
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">Del
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($units as $key => $unit)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key }}</td>

                                        <td
                                            class="text-sm text-blue-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $unit->name }}
                                        </td>
                                        <td
                                            class="text-sm text-blue-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            <b><a target="_blank" href="{{route('unit.show', $unit->slug)}}">View Unit </a></b>
                                        </td>
                                        <td
                                            class="text-sm text-blue-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            <a uk-tooltip="Edit Unit" href="{{route('unit.edit', $unit) }}"> <span
                                                    style="color: rgba(250, 164, 6, 0.986)"
                                                    class="icon-feather-edit "></span></a>
                                        </td>
                                        <td
                                            class="text-sm text-blue-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            <form action="{{ route('unit.destroy', $unit) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" uk-tooltip="Delete Unit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span style="color: red" class="icon-feather-trash-2"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                            Click the <b>Add</b> button above to get started!
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-example" uk-modal>
            <div class="uk-modal-dialog">

                <button class="uk-modal-close-default m-3" type="button" uk-close></button>

                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">Add unit</h2>
                </div>

                <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="uk-modal-body" uk-overflow-auto>
                        <div>
                            <div class="line">
                                <input class="line__input" id="name" name="name" type="text"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                    autocomplete="off">
                                <span for="name" class="line__placeholder"> Name </span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-modal-footer text-right">
                        <button class="button blue uk-modal-close" type="button">Cancel</button>
                        <button class="button" type="submit">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
