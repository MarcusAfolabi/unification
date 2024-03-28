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
            @livewire('auth.login')
        </div>
    </div>
</div>
@endsection