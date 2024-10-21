@extends('layouts.main')
@section('title', ' Sub Convention Registration')
@section('description', 'Cherubim and Seraphim Unification Campus Fellowship present Register for the coming sub convention and ensure to make payment as onsite payment would not be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/subconvention')

@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> SUB - CONVENTION 2024 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Ensure to provide accurate information and
                proceed to make payment</div>
        </div>
    </div>
    <div class="lg:w-full w-full lg:mt-0 mt-7">

        <div class="card mb-6">
            <div class="card-media h-28">
                <div class="card-media-overly"></div>
                <img src="http://unification.test/assets/images/funding/funder-4.jpg" alt="" class="">
            </div>
            <div class="p-5">
                <h4 class="text-xl font-semibold mb-1"> Step 1</h4>
                <hr>
                <p class="font-medium mt-3">Payment Details</p>
                <p class="font-small">Graduate Fee: N4,000</p>
                <p class="font-small mb-3">Undergraduate Fee: N2,000</p>
                <hr>

                <p class="font-medium mt-3">Online Bank Transfer Payment</p>
                <div class="mt-4 text-base font-medium space-y-2">
                    <div class="flex items-center">
                        <ion-icon name="medkit" class="text-lg mr-3"></ion-icon> 2016294268
                    </div>
                    <div class="flex items-center">
                        <ion-icon name="school" class="text-lg mr-3"></ion-icon> First Bank of Nigeria
                    </div>
                    <div class="flex items-center">
                        <ion-icon name="heart-circle" class="text-lg mr-3"></ion-icon> Cherubim and Seraphim Church Unification Campus Fellowship
                    </div>
                </div>
                <br>
                <hr>
            </div>
            @livewire('subconvention-form')
        </div>
    </div>

    @endsection