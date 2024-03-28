@extends('layouts.main')
@section('title', 'Membership Registration')
@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key')}}"></script>
<div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">Membership Registration</div>
            <div class="text-white text-lg font-medium text-opacity-90">Ensure your information are accurate
            </div>
        </div>
    </div>
    @livewire('auth.register')
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmit(token) {
        document.getElementById("register").submit();
    }
</script>
 @endsection