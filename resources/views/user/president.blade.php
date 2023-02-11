@extends('layouts.main')
@section('title', 'Welcome')

@section('main')
 

<div class="main_content">
    <div class="mcontainer">
        {{-- <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    All Members
                </h5>
            </div>
        </div> --}}
          <!--  breadcrumb -->
          <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('user.index') }}">All Users</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('user.create') }}">Add new </a>
                    </li>
                </ul>
            </div>
        </div>

        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}</p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="members"
                        placeholder="Search for Names, Fellowship and more.." autocomplete="off">
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
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            FirstName</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Profile Photo</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Email</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Phone</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Fellowship</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Position Held</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Unit Occupied</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Occupation</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Married Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ url('member', $user) }}">
                                                {{ $user->name }} </a>
                                        </td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($user->profile_photo_url) }}"> <img
                                                    src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}"
                                                    class="rounded-lg" style="max-height: 50px; max-width:50px"
                                                    srcset=""></a></th>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="tel:{{ $user->phoneNumber }}">
                                                {{ $user->phoneNumber }}</a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->yourFellowship }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->positionHeld }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->unit_in_fellowship }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->occupation }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $user->relationship_status }}</td>
                                        <td >
                                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
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

            @if (!auth()->user()->isAdmin())

            <div class="profile user-profile">

                <div class="profiles_banner">
                    <img src="{{ asset('assets/images/avatars/profile-cover.jpg') }}"
                        alt="{{ auth()->user()->lastname }}">
                    <div class="profile_action absolute bottom-0 right-0 space-x-1.5 p-3 text-sm z-50 hidden lg:flex">

                        <a href="{{ route('profile.show') }}"
                            class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                            <ion-icon name="crop-outline" class="text-xl"></ion-icon>
                            <span> Crop </span>
                        </a>
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                            <ion-icon name="create-outline" class="text-xl"></ion-icon>
                            <span> Edit </span>
                        </a>
                        <a href="tel:{{ auth()->user()->phoneNumber }}"
                            class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                            <ion-icon name="create-outline" class="text-xl"></ion-icon>
                            <span> Chat Member </span>
                        </a>
                    </div>
                </div>
                <div class="profiles_content">

                    <div class="profile_avatar">
                        <div class="profile_avatar_holder">
                            <img src="{{ asset(auth()->user()->profile_photo_url) }}" alt="">
                        </div>
                        <div class="user_status status_online"></div>
                        <div class="icon_change_photo" hidden>
                            <ion-icon name="camera" class="text-xl"></ion-icon>
                        </div>
                    </div>

                    <div class="profile_info">
                        <h1> {{ auth()->user()->name }} {{ auth()->user()->lastname }} </h1>
                        <p> {{ auth()->user()->positionHeld }}, {{ auth()->user()->unit_in_fellowship }}, <a
                                href="{{ route('profile.show') }}"> <span class="uil-edit-alt mr-1"></span> </a>
                        </p>
                    </div>

                </div>

                <div class="flex justify-between lg:border-t border-gray-100 flex-col-reverse lg:flex-row pt-2">
                    <nav class="responsive-nav pl-3">
                        <ul uk-switcher="connect: #timeline-tab; animation: uk-animation-fade">
                            <li><a href="#">Timeline</a></li>
                            <li><a href="{{ url('products') }}">My Products </a></li>
                            {{-- <li><a href="#">Store Category </a></li>
                            <li><a href="#">Posts</a></li>
                            <li><a href="#" title="Graduate Forum">GF Group</a></li>
                            <li><a href="#">Videos</a></li> --}}
                        </ul>
                    </nav>

                    <!-- button actions -->
                    <div class="flex items-center space-x-1.5 flex-shrink-0 pr-4 mb-2 justify-center order-1 relative">

                        <!-- add story -->
                        <a href="{{ route('posts.create') }}"
                            class="flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white"
                            uk-toggle="target: #create-post-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span> Add Your Story </span>
                        </a>



                        <!-- more icon -->
                        <a href="#" class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100">
                            <ion-icon name="ellipsis-horizontal" class="icon-brand-whatsapp"></ion-icon>
                            {{-- <span class="icon-brand-whatsapp"></span> --}}

                        </a>
                    </div>

                </div>

            </div>

            <div class="uk-switcher lg:mt-8 mt-4" id="timeline-tab">

                <!-- Timeline -->
                <div class="md:flex md:space-x-6 lg:mx-16">
                    <div class="space-y-5 flex-shrink-0 md:w-7/12">

                        <!-- create post  -->
                        <div class="card lg:mx-0 p-4">
                            <a href="{{ route('posts.create') }}">
                                <div class="flex space-x-3">
                                    <img src="{{ asset(auth()->user()->profile_photo_url) }}"
                                        class="w-10 h-10 rounded-full">
                                    <input placeholder="What's Your Mind? {{ auth()->user()->lastname }}!"
                                        class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                                </div>
                                <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                                    <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                        <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block"
                                            data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Photo/Video
                                    </div>
                                    <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                        <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block"
                                            uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            title="" aria-expanded="false">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                            </path>
                                        </svg>
                                        Tag Friend
                                    </div>
                                    <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                        <svg class="bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        Fealing /Activity
                                    </div>
                                </div>
                            </a>
                        </div>



                        {{-- <div class="flex justify-center mt-6">
                            <a href="{{ route('posts.create') }}"
                                class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                                Add Your First Story</a>

                        </div> --}}
                        <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                            <h2 class="text-xl font-bold"> My Posts</h2>



                            <div class="grid md:grid-cols-3 sm:grid-cols-3 grid-cols-2 gap-x-2 gap-y-4 mt-3">
                                @foreach ($timelineposts as $timelinepost)
                                @if (auth()->user()->id === $timelinepost->user->id)
                                <div class="card p-2">
                                    <a href="{{ route('posts.show', $timelinepost) }}">
                                        <img src="{{ asset($timelinepost->image) }}"
                                            class="h-36 object-cover rounded-md shadow-sm w-full">

                                        <div class="pt-3 px-1">
                                            <a href="{{ route('posts.show', $timelinepost) }}"
                                                class="text-base font-semibold mb-0.5">
                                                {{ $timelinepost->postTitle }}
                                                <p class="font-medium text-sm">843K views </p>
                                                <button
                                                    class="bg-blue-100 w-full flex font-semibold h-8 items-center justify-center mt-3 px-3 rounded-md text-blue-600 text-sm mb-1">
                                                    Read
                                                </button>
                                        </div>
                                    </a>
                                    </a>
                                </div>
                                @endif
                                @endforeach


                            </div>

                            <div class="flex justify-center mt-6">
                                {{-- <a href="#"
                                    class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                                    Load more ..</a> --}}
                                {{ $timelineposts->links() }}
                            </div>

                        </div>


                    </div>

                    <!-- Sidebar -->
                    <div class="w-full space-y-6">

                        <div class="widget card p-5">
                            <h4 class="text-lg font-semibold"> About You</h4>
                            <ul class="text-gray-600 space-y-3 mt-3">
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-mail"></span>
                                </li>{{ auth()->user()->email }}
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-user"></span>
                                </li>{{ auth()->user()->gender }}
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-home"></span>
                                </li>{{ auth()->user()->contact_address }} <br>
                                {{ auth()->user()->country_of_residence }}
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-phone"></span>
                                </li>{{ auth()->user()->phoneNumber }}
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-award"></span>
                                </li>{{ auth()->user()->academicStatus }}
                            </ul>

                            <a href="#" class="button gray mt-3 w-full"> Edit </a>
                        </div>

                        <div class="widget card p-5">
                            <h4 class="text-lg font-semibold"> Your Institution </h4>
                            <ul class="text-gray-600 space-y-3 mt-3">
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>{{ auth()->user()->yourFellowship
                                    }}
                                </li>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>{{
                                    auth()->user()->qualification_one }}
                                </li>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>
                                    {{ auth()->user()->degree_one }} {{ auth()->user()->course_one }}
                                </li>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>
                                    {{ auth()->user()->graduationYear }}
                                </li>
                                <a href="#" class="button gray mt-3 w-full"> Second Degree </a>

                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>{{
                                    auth()->user()->qualification_two }}
                                </li>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>
                                    {{ auth()->user()->degree_two }} {{ auth()->user()->course_two }}
                                </li>
                                <a href="#" class="button gray mt-3 w-full"> Third Degree </a>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>{{
                                    auth()->user()->qualification_three }}
                                </li>
                                <li class="flex items-center space-x-2">
                                    <span class="icon-feather-bookmark"></span>
                                    {{ auth()->user()->degree_three }} <br> {{ auth()->user()->course_three }}
                                </li>

                            </ul>

                            <a href="#" class="button gray mt-3 w-full"> Edit </a>
                        </div>
                        <div class="widget card p-5">
                            <h4 class="text-lg font-semibold"> My Others</h4>
                            <ul class="text-gray-600 space-y-3 mt-3">
                                <li class="flex items-center space-x-2">
                                    <ion-icon name="home-sharp" class="rounded-full bg-gray-200 text-xl p-1 mr-3">
                                    </ion-icon>
                                    Relationship: <strong> {{ auth()->user()->relationship_status }}</strong>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <ion-icon name="globe" class="rounded-full bg-gray-200 text-xl p-1 mr-3">
                                    </ion-icon>
                                    Employed as: <strong> {{ auth()->user()->occupation }} </strong>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <ion-icon name="heart-sharp" class="rounded-full bg-gray-200 text-xl p-1 mr-3">
                                    </ion-icon>
                                    My Skill: <strong> {{ auth()->user()->professional_skill }} </strong>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <ion-icon name="heart-sharp" class="rounded-full bg-gray-200 text-xl p-1 mr-3">
                                    </ion-icon>
                                    Office: <strong> {{ auth()->user()->office_address }} </strong>
                                </li>

                            </ul>

                            <a href="#" class="button gray mt-3 w-full"> Edit </a>
                        </div>

                    </div>
                </div>

                <!-- Products  -->
                <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                    <h2 class="text-xl font-bold"> Products</h2>



                    <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-x-2 gap-y-4 mt-3">
                        @foreach ($timelineproducts as $timelineproduct)
                        @if (auth()->user()->id === $timelineproduct->user->id)
                        <div class="card p-2">
                            <a href="{{ route('products.show', $timelineproduct) }}">
                                <img src="{{ asset($timelineproduct->image1) }}"
                                    class="h-36 object-cover rounded-md shadow-sm w-full">
                            </a>
                            <div class="pt-3 px-1">
                                <a href="{{ route('products.show', $timelineproduct) }}"
                                    class="text-base font-semibold mb-0.5"> {{ $timelineproduct->title }}
                                    <p class="font-medium text-sm">843K views </p>
                                    <button
                                        class="bg-blue-100 w-full flex font-semibold h-8 items-center justify-center mt-3 px-3 rounded-md text-blue-600 text-sm mb-1">
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach


                    </div>

                    <div class="flex justify-center mt-6">
                        {{ $timelineproducts->links() }}

                    </div>

                </div>

            </div>
            @endif  

        </div>
        {{ $users->links() }}
    </div>
</div>
</div>
</div>
@endsection
