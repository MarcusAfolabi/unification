@extends('layouts.main')
@section('title', 'Add fellowship')

@section('main')
    <div class="main_content">
        <div class="mcontainer">
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('fellowship.index') }}">List of fellowships</a>
                        </li>
                        <li class="active">
                            <a href="#">Adding New fellowship </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                @if (session('status'))
                    <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Add New fellowship </h3>
                </div> 
                <form method="POST" action="{{ route('fellowship.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" required name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Name Of Fellowship </span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="acronyms" required name="acronyms" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }}"
                                autocomplete="off">
                            <span for="acronyms" class="line__placeholder"> Fellowship Acronym </span>
                        </div>
                        @error('acronyms')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        
                        <div class="line">
                            <input class="line__input" id="phone" required name="phone" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('phone') }}"
                                autocomplete="off">
                            <span for="phone" class="line__placeholder"> Fellowship Phone No </span>
                        </div>
                        @error('phone')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        
                        <div class="line">
                            <input class="line__input" id="address" required name="address" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('address') }}"
                                autocomplete="off">
                            <span for="address" class="line__placeholder"> Fellowship Address </span>
                        </div>
                        @error('address')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="file" required name="logo" type="file"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('logo') }}"
                                autocomplete="off">
                            <span for="logo" class="line__placeholder"> Fellowship Logo </span>
                        </div>
                        @error('logo')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                      
                    </div>
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> </p>
                        <button class="button blue" type="submit">ADD</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
