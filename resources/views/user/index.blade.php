@extends('layouts.main')
@section('title', 'List of all members')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('user.index') }}">All Members</a>
                    </li>
                    <li>
                        <a href="{{ route('user.president') }}">All President</a>
                    </li>
                    <li>
                        <a href="{{ route('user.pro') }}">All PRO</a>
                    </li>
                    <li class="active">
                        <a href="#modal-user" uk-toggle>Add new </a>
                    </li>
                </ul>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="members" placeholder="Search for Names, Fellowship and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($users->count() > 0)
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
                                            Photo</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Email</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Phone</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Fellowship</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Post Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Unit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ url('member', $user) }}">
                                                {{ $user->name ?? '' }} </a>
                                        </td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ asset($user->profile_photo_url) }}"> <img src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""></a></th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="mailto:{{ $user->email }}">{{ $user->email ?? '' }}</a>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a href="tel:{{ $user->phone }}">
                                                {{ $user->phone ?? '' }}</a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->fellowship->name ?? '' }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->fellowship_status ?? '' }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->unit->name ?? '' }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user) }}" method="POST">
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
                        <p class="text-center text-opacity-75"> Nobody has showed up</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        {{ $users->links() }}
    </div>
</div>
<div id="modal-user" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New Member</h2>
        </div>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Name </span>
                </div>
                <div class="line">
                    <input class="line__input" id="email" name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}" autocomplete="off">
                    <span for="email" class="line__placeholder"> Email </span>
                </div>
                <div class="line"><select name="fellowship_id" class="selectpicker">
                        <option selected disabled value="{{ old('fellowship_id')}}">Fellowship</option>
                        @foreach (App\Models\Fellowship::select('id', 'name')->latest()->get() as $fellowship) <option value="{{$fellowship->id}}">{{$fellowship->name}}</option>@endforeach
                    </select>
                </div>
                <div class="line"><select name="unit_id" class="selectpicker">
                        <option selected disabled>Unit  </option>
                        @foreach(App\Models\Unit::select('id', 'name')->latest()->get() as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="line">
                    <input class="line__input" id="password" name="password" type="password" onkeyup="this.setAttribute('value', this.value);" value="{{ old('password') }}" autocomplete="off">
                    <span for="password" class="line__placeholder"> Password </span>
                </div>
            </div>

            <!-- form footer -->
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> </p>
                <button class="button blue" type="submit">SAVE</button>
            </div>
        </form>
    </div>
</div>
@endsection