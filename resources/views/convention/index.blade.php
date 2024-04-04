@extends('layouts.main')
@section('title', 'Convention Registration')
@section('description',
    'Register for the coming sub convention and ensure to make payment as onsite payment would not
    be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')

@section('main')
    <div class="main_content">
        <div class="mcontainer">
            <div class="relative flex items-center justify-between mb-3 md:mb-4">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold">
                        <b>{{ $conventions->count() }}</b> Registered
                    </h2>
                </div>
                <a uk-tooltip="Add" href="{{ route('convention.index') }}"
                    class="absolute right-0 z-10 flex items-center justify-center h-8 px-2 space-x-1 text-white bg-red-600 rounded-md lg:px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg> <span class="hidden md:block"> Add</span>
                </a>
            </div>
            <div class="card">
                <div class="header_search"><i class="uil-search-alt"></i>
                    <form action="">
                        <input type="text" class="form-control" name="search" placeholder="Search..."
                            autocomplete="off">
                    </form>
                </div>
                <hr>
                <br>
                <x-jet-validation-errors class="alert alert-danger" />
                @if (session('status'))
                    <div class="relative p-5 border-t-4 border-red-600 rounded-md shadow-lg bg-whit" uk-alert>
                        {{ session('status') }}
                    </div>
                @endif
                @if ($conventions->count() > 0)
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full border border-collapse border-slate-400">
                                        <thead class="border-b dark:bg-white">
                                            <tr>
                                                <th scope="col"
                                                    class="px-1 py-1 dark:text-white text-sm font-medium border text-dark border-slate-300">
                                                    S/N
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Full name
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Fellowship
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Academic Status
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Position Held
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Phone
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Email
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    When
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-1 text-sm font-medium border text-dark border-slate-300">
                                                    Delete
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($conventions as $key => $convention)
                                                <tr class="bg-white border-b">
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium dark:text-white text-gray-900 whitespace-nowrap">
                                                        {{ ++$key }}</td>

                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->firstname }} {{ $convention->lastname }}
                                                    </td>
                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->fellowship }}
                                                    </td>
                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->academic_status }}
                                                    </td>
                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->fellowship_status }}
                                                    </td>
                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->phone }}
                                                    </td>
                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ $convention->email }}
                                                    </td>

                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        {{ \Carbon\Carbon::parse($convention->created_at)->format('l, jS F Y') }}
                                                    </td>

                                                    <td
                                                        class="px-1 py-1 text-sm font-light dark:text-white text-gray-900 border whitespace-nowrap border-slate-300">
                                                        <form action="{{ route('convention.destroy', $convention) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" uk-tooltip="Delete Member"
                                                                onclick="return confirm('Hey, Are you sure about this?');">
                                                                <span style="color: red"
                                                                    class="icon-feather-trash-2"></span>
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
    {{ $conventions->links() }}
    </div>

    </div>
    </div>
@endsection
