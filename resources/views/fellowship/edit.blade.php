@extends('layouts.main')
@section('title', 'Edit fellowship')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('fellowship.index') }}">Back</a>
                        </li>
                        <li class="active">
                            <a href="#">Editing fellowship </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            <x-jet-validation-errors class="alert alert-danger" />
           
                <!-- form header -->
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Edit Fellowship </h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('fellowship.update', $fellowship) }}">
                    @csrf
                    @method('put')
                    <div class="p-10 space-y-7">
                    <div class="line">
                    <input class="line__input" id="name" required name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }} {{ $fellowship->name }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Name of Fellowship </span>
                </div> 

                <div class="line">
                    <input class="line__input" id="acronyms" required name="acronyms" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }} {{ $fellowship->acronyms }}" autocomplete="off">
                    <span for="acronyms" class="line__placeholder"> Fellowship Acronym </span>
                </div> 

                <div class="line">
                    <input class="line__input" id="phone" required name="phone" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $fellowship->phone }}" autocomplete="off">
                    <span for="phone" class="line__placeholder"> Fellowship Phone No </span>
                </div> 

                <div class="line">
                    <input class="line__input" id="address" required name="address" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $fellowship->address }}" autocomplete="off">
                    <span for="address" class="line__placeholder"> Fellowship Address </span>
                </div> 

                <div class="line">
                    <input class="line__input" id="file" name="logo" type="file" onkeyup="this.setAttribute('value', this.value);" autocomplete="off">
                    <span for="logo" class="line__placeholder"> Fellowship Logo </span>
                </div> 


                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> </p>
                        <button class="button blue" type="submit">UPDATE</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
