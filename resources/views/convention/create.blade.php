@extends('layouts.main')
@section('title', '2024 Convention Registration')
@section('description',
    'Register for the coming convention and ensure to make payment as onsite payment would not be
    allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')
@section('main')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <div class="main_content">
        <div
            class="relative flex items-center justify-center w-full pb-10 bg-gradient-to-tr from-blue-400 to-blue-300 via-blue-400">
            <div class="relative z-10 max-w-xl px-5 mx-auto text-center">
                <div class="mb-3 text-2xl font-semibold text-white lg:text-4xl"> CONVENTION {{ date('Y') }} </div>
                <div class="text-lg font-medium text-white text-opacity-90"> Ensure to make payment and then provide accurate
                    information to confirm your registration</div>
            </div>
        </div>
        <div class="mcontainer">

            @livewire('convention')
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("convention").submit();
        }
    </script>
@endsection
