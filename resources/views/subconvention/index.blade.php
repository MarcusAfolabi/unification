@extends('layouts.main')
@section('title', 'Sub Convention Registration')
@section('description', 'Register for the coming sub convention and ensure to make payment as onsite payment would not
be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold">
                    All Sub Convention Members
                </h2>
            </div>
            <a uk-tooltip="Add" href="{{ route('subconvention.create') }}"
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
                    <input type="text" class="form-control" name="search" placeholder="Search..." autocomplete="off">
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
            @if ($subconventions->count() > 0)
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
                                            Institution
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Academic Status
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Position Held
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Graduated Year
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Phone
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">
                                            Contact Address
                                        </th>


                                        <th scope="col"
                                            class="text-sm font-medium text-dark px-1 py-1 border border-slate-300">Delete
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($subconventions as $key => $subconvention)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key }}</td>

                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->firstname }} {{ $subconvention->lastname }} {{
                                            $subconvention->middlename }}
                                        </td>
                                        <td
                                        class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                        {{ $subconvention->yourFellowship }}
                                    </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->academicStatus }} | {{
                                            $subconvention->unificationCurrentPost }} | {{
                                            $subconvention->unificationStatus }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->positionHeld }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->graduationYear }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->phoneNumber }}
                                        </td>
                                        <td
                                        class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                        {{ $subconvention->email }}
                                    </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            {{ $subconvention->contactAddress }}
                                        </td>

                                        <td
                                            class="text-sm text-gray-900 font-light px-1 py-1 whitespace-nowrap border border-slate-300">
                                            <form action="{{ route('subconvention.destroy', $subconvention) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" uk-tooltip="Delete Member"
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
                            Welcome {{ auth()->user()->name }}, Click the <b>Add</b> button above to get started!
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            {{ $subconventions->links() }}
        </div>

    </div>
</div>
@endsection