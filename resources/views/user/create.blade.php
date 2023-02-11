@extends('layouts.main')
@section('title', 'New User')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

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

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                @if (session('status'))
                    <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif 

                <!-- form body -->

                <form method="POST" action="{{ route('user.store') }}" >
                    @csrf
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Name </span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror 
                      
                        <div class="line">
                            <input class="line__input" id="email" name="email" type="email"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}"
                                autocomplete="off">
                            <span for="email" class="line__placeholder"> Email </span>
                        </div>
                        @error('email')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        <div class="line">
                            <input class="line__input" id="password" name="password" type="password"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('password') }}"
                                autocomplete="off">
                            <span for="password" class="line__placeholder"> Password </span>
                        </div>
                        @error('password')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                           
                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6">  </p>
                        <button class="button dark" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(description => {
                console.log(description);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
