@extends('layouts.main')
@section('title', 'Admin Dashboard')
@section('description', 'Welcome to your Admin dashboard')
@section('canonical', 'https://cnsunification.org/dashboard')

@section('main')
<div class="main_content">
    <div class="mcontainer">
        @if (session('status'))
        <p class="bg-contacts-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <h3 class="text-lg font-semibold mb-2" id="Custom-class">Admin Dashboard</h3>        
        <div class="grid md:grid-cols-2 gap-4" uk-sortable="cls-custom: transform -rotate-6 shadow-2xl">

            <a href="{{route('user.index')}}">
            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-blue-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $total_users }}</div>
                    <p class="text-sm"> Overall Members </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>
            </a>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-contacts-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg">{{ $posts }}</div>
                    <p class="text-sm"> Overall Posts </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-purple-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $prayers }} </div>
                    <p class="text-sm"> Posted Prayers </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-purple-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $jobs }} </div>
                    <p class="text-sm"> Overall Job Vacancy </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-purple-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $audios }} </div>
                    <p class="text-sm"> Total Audios </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-pink-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $videos }} </div>
                    <p class="text-sm"> Total Videos </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex ">
                <div class="bg-purple-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $products }} </div>
                    <p class="text-sm"> Total Products </p>
                </div>
                <i class="icon-feather-shopping-cart text-xl"></i>
            </div> 
            
            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $books }} </div>
                    <p class="text-sm"> Total Books </p>
                </div>
                <i class="icon-feather-shopping-cart text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $convention }} </div>
                    <p class="text-sm"> Registered Convention </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
               <a href="{{ route('subconvention.list') }}"> <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $subconvention }} </div>
                    <p class="text-sm"> Registered Sub Convention </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </a>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $fellowship }} </div>
                    <p class="text-sm"> Overall Isokan Chapters </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>
            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $total_cec }} </div>
                    <p class="text-sm"> Overall Isokan CEC Executives </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $president }} </div>
                    <p class="text-sm"> Overall Isokan Presidents Executives </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg shadow-md p-3 flex">
                <div class="bg-yellow-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> {{ $secretary }} </div>
                    <p class="text-sm"> Overall Isokan Secretary </p>
                </div>
                <i class="icon-feather-users text-xl"></i>
            </div>

            <div class="bg-white rounded-lg border-t-4 border-pink-600 shadow-md p-3 flex">
                <div class="bg-red-600 rounded-lg w-1.5"></div>
                <div class="ml-4 flex-1">
                    <div class="font-semibold text-lg"> Send Notification (All Users) </div>
                    <form method="POST" action="{{ url('send') }}">
                        @csrf
                        <div class="p-10 space-y-3">
                            <div class="line">
                                <input class="line__input" id="greeting" name="greeting" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('greeting') }}" autocomplete="off">
                                <span for="greeting" class="line__placeholder"> Greetings </span>
                            </div>

                            <div class="line">
                                <input class="line__input" id="subject" name="subject" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('subject') }}" autocomplete="off">
                                <span for="subject" class="line__placeholder"> Subject </span>
                            </div>


                            <div class="line h-32">
                                <textarea class="line__input h-32" id="body" name="body">{{ old('body') }}</textarea>
                                <span for="body" class="line__placeholder"> Body </span>

                            </div>

                            <div class="line">
                                <input class="line__input" id="actiontext" name="actiontext" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('actiontext') }}" autocomplete="off">
                                <span for="actiontext" class="line__placeholder"> Action Text </span>
                            </div>
                            <div class="line">
                                <input class="line__input" id="url" name="url" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ old('url') }}" autocomplete="off">
                                <span for="url" class="line__placeholder"> Action Url </span>
                            </div>
                            <div class="line">
                                <input class="line__input" id="footer" name="footer" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('footer') }}" autocomplete="off">
                                <span for="footer" class="line__placeholder"> Footer </span>
                            </div>
                        </div>

                        <!-- form footer -->
                        <div class="border-t flex justify-between lg:space-x-10 p-7 bg-contacts-50 rounded-b-md">
                            <p class="text-sm leading-6"> Ensure to preview before you send. </p>
                            {{-- <input type="submit" class="button lg:w-1/1" value="Notify"> --}}
                            <button type="submit" class="bg-red-600 font-semibold mx-auto px-10 py-3 rounded-md text-center text-white">
                                Notify
                            </button>
                        </div>
                    </form>
                </div>
                <i class="icon-material-baseline-notifications-none text-xl"></i>
            </div>
        </div>
    </div>
</div>
@endsection