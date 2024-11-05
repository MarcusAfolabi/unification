@extends('layouts.main')
@section('title', 'Sub Convention Member')
@section('main')
<!--  breadcrumb -->

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('subconvention') }}"><i class="icon-material-outline-add"></i> New </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="prayers" placeholder="Search for Bible Study, Prayer and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($subconventions->count() > 0)
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
                                            Download ID</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Full Name</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Fellowship Name</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Gender</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Phone Number</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Academic Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Fellowship Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Unit member</th>

                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            When</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($subconventions as $key => $convention)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a class="is_link" href="{{ route('subconvention.idcard', $convention->email) }}">Download ID Card</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $convention->lastname }} {{ $convention->firstname }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $convention->fellowship_id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $convention->gender }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $convention->phone }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $convention->academic_status }} </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $convention->fellowship_status }} </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $convention->unit_id }} </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($convention->created_at)->format('l, jS M. Y g:ia') }}
                                        </td>

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
            {{ $subconventions->links() }}
        </div>
    </div>
</div>
@endsection