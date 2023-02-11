@extends('layouts.main')
@section('title', 'Edit Institution')

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
                            <a href="#">Editing Institution </a>
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
                    <h3 class="font-bold text-xl"> Edit Resource </h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('institution.update', $institution) }}">
                    @csrf
                    @method('put')
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{  $institution->name }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Name </span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="code" name="code" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ $institution->code }}"
                                autocomplete="off">
                            <span for="code" class="line__placeholder"> Code </span>
                        </div>
                        @error('code')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="line">
                            <input class="line__input" id="state" name="state" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ $institution->state }}"
                                autocomplete="off">
                            <span for="code" class="line__placeholder"> Fellowship State </span>
                        </div>
                        @error('state')
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
