@extends('layouts.main')
@section('title', 'Add Institution')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('institution.index') }}">Back</a>
                        </li>
                        <li class="active">
                            <a href="#">Adding New Institution </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                @if (session('status'))
                    <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif
                <!-- form header -->
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Add New Institution </h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('institution.store') }}">
                    @csrf
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Name Of Fellowship </span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="acronyms" name="acronyms" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }}"
                                autocomplete="off">
                            <span for="acronyms" class="line__placeholder"> Fellowship Acronym </span>
                        </div>
                        @error('acronyms')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        
                        <div class="line">
                            <input class="line__input" id="phone" name="phone" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('phone') }}"
                                autocomplete="off">
                            <span for="phone" class="line__placeholder"> Fellowship Phone No </span>
                        </div>
                        @error('phone')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        
                        <div class="line">
                            <input class="line__input" id="address" name="address" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('address') }}"
                                autocomplete="off">
                            <span for="address" class="line__placeholder"> Fellowship Address </span>
                        </div>
                        @error('address')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="state" name="state" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('state') }}"
                                autocomplete="off">
                            <span for="state" class="line__placeholder"> Fellowship State </span>
                        </div>
                        @error('state')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="country" name="country" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('country') }}"
                                autocomplete="off">
                            <span for="country" class="line__placeholder"> Fellowship Country </span>
                        </div>
                        @error('country')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="year_of_establishment" name="year_of_establishment" type="date"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('year_of_establishment') }}"
                                autocomplete="off">
                            <span for="year_of_establishment" class="line__placeholder"> Year of Establishment </span>
                        </div>
                        @error('year_of_establishment')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                    </div>
                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> </p>
                        <button class="button dark" type="submit">SAVE</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
