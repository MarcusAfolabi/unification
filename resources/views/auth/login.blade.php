@extends('layouts.main')
@section('title', 'Membership Login')
@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<div class="min-full flex">
    <div class="mx-auto w-full max-w-sm lg:w-96">
        <br>
        <br>
        <br>
        <div class="mt-8">
            <div class="mt-6"> 
                <x-jet-validation-errors class="mb-4" /> 
                <form method="POST" action="{{ route('login') }}" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
                    @csrf
                    <div class="line">
                        <input class="line__input" id="email" required autofocus name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}" autocomplete="off">
                        <span for="email" class="line__placeholder">Email </span>
                    </div>

                    <div class="line">
                        <input class="line__input" id="password" name="password" type="password" autocomplete="current-password" onkeyup="this.setAttribute('value', this.value);" value="{{ old('password') }}" autocomplete="off">
                        <span for="password" class="line__placeholder">Password </span>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="remember_me" name="remember">
                        <label for="remember_me"><span class="checkbox-icon"></span>Remember me
                        </label>
                    </div>
                    <button type="submit" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full">
                        Log In
                    </button>
                    <a href="{{ route('password.request') }}" class="text-blue-500 text-center block"> Forgot
                        Password? </a>
                    <hr class="pb-3.5">
                    <div class="flex">
                        <a href="{{route('register')}}" type="button" class="bg-blue-600 hover:bg-blue-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                            New Member?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection