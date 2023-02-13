@extends('layouts.main')
@section('title', 'Convention Registration')
@section('description', 'Register for the coming convention and ensure to make payment as onsite payment would not be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')

@section('main')
<script src="http://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementById("recaptcha").submit();
       }
     </script>
     <div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">

        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> CONVENTION 2023 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Ensure to provide accurate information and
                proceed to make payment</div>
        </div>

    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST" action="{{ route('convention.store') }}" id="recaptcha" enctype="multipart/form-data">
                <x-jet-validation-errors class="mb-4" />
                <div class="">
                    @csrf
                    <div class=""> 
                        <!-- <input type="text" class="g-recaptcha with-border" name="g-recaptcha-response" id="recaptcha"> -->
                        <div class="line mb-4"><input class="line__input" id="email" required autofocus name="firstname" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('firstname')}}" autocomplete="off"><span for="name" class="line__placeholder">Name </span></div>
                        <div class="line mb-4"><input class="line__input" id="lastname" required autofocus name="lastname" type="lastname" onkeyup="this.setAttribute('value', this.value);" value="{{ old('lastname')}}" autocomplete="off"><span for="lastname" class="line__placeholder">Last name </span></div>
                        <div class="line mb-4"><input class="line__input" id="email" required autofocus name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email')}}" autocomplete="off"><span for="email" class="line__placeholder">Email </span></div>
                        <div class="line mb-4"><select type="text" name="gender" class="selectpicker">
                                <option value="{{ old('gender')}}">Select Gender </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select></div>
                        <div class="line mb-4"><input class="line__input" maxlength="14" id="tel" required autofocus name="phone" placeholder="+2348033440122" type="tel" onkeyup="this.setAttribute('value', this.value);" value="{{ old('phoneNumber')}}" autocomplete="off"><span for="phoneNumber" class="line__placeholder">Phone Number </span>
                        </div>
                        <div class="line mb-4"><select type="text" required name="academic_status" class="selectpicker">
                                <option selected disabled value="{{ old('academic_status')}}">Graduate? Pls Select </option>
                                <option value="Graduate">Yes, Graduate </option>
                                <option value="Postgraduate">No, Postgraduate </option>
                                <option value="Undergraduate">No, Undergraduate </option>
                            </select></div>
                        <div class="line mb-4"><select type="text" required name="fellowship_id" class="selectpicker">
                                <option selected disabled value="{{ old('fellowship_id')}}">Fellowship Name? Pls Select
                                </option>@foreach ($fellowships as $fellowship) <option value="{{$fellowship->id}}">{{$fellowship->name}}</option>@endforeach <option value="{{ old('fellowship_id')}}">{{ old('yourFellowship')}}</option>
                                <option value="1">Abraham Adesanya Polytechnic,
                                    Ijebu Igbo. </option>
                                <option value="2">Zenith University, Ghana </option>
                            </select></select></div>
                        <div class="line mb-4"><select type="text" required name="fellowship_status" class="selectpicker">
                                <option selected disabled value="{{ old('fellowship_status')}}">Fellowship Post? Pls Select
                                </option>
                                <option value="ASSISTANT SECRETARY">ASSISTANT SECRETARY </option>
                                <option value="CHOIR MASTER/MISTRESS">CHOIR MASTER/MISTRESS </option>
                                <option value="EVANGELISM SECRETARY">EVANGELISM SECRETARY </option>
                                <option value="FEMALE CO-ORDINATOR">FEMALE CO-ORDINATOR </option>
                                <option value="FINANCIAL SECRETARY">FINANCIAL SECRETARY </option>
                                <option value="LEVITE CO-ORDINATOR">LEVITE CO-ORDINATOR </option>
                                <option value="PRAYER MINISTRY LEADER">PRAYER MINISTRY LEADER </option>
                                <option value="PRESIDENT">PRESIDENT </option>
                                <option value="PUBLICITY SECRETARY">PUBLICITY SECRETARY </option>
                                <option value="SECRETARY">SECRETARY </option>
                                <option value="TREASURY SECRETARY">TREASURY SECRETARY </option>
                                <option value="VICE PRESIDENT">VICE PRESIDENT </option>
                                <option value="WELFARE SECRETARY">WELFARE SECRETARY </option>
                                <option value="MEMBER">MEMBER </option>
                                <option value="CENTRAL EXECUTIVE COUNCIL">OTHERS - CENTRAL EXECUTIVE MEMBER</option>
                            </select></div>

                        <div class="line mb-4"><select type="text" required placeholder="Fellowship Name?" name="unit_id" class="selectpicker">
                                <option selected disabled value="{{ old('unit_id')}}">Unit in Fellowship? Pls
                                    Select </option>
                                @foreach(App\Models\Unit::all() as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }} </option>
                                @endforeach

                            </select></div>

                        <input type="file" uk-tooltip="Profile Photo" required class="form-control with-border" accept="image/*" name="profile_image" />
                        <sup><b><a href="#">Range from 300px to 600px max | 300kb Max</a></b></sup>
                        <div class="form-group">
                        {!! RecaptchaV3::initJs() !!}
                        {!! RecaptchaV3::field('contact-us') !!} 
                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-blue-600 hover:text-blue-900" href="{{ route('convention.payment') }}">
                                {{ __('Already registered? Make Payment Now') }}
                            </a>

                            <x-jet-button class="g-recaptcha ml-5" data-sitekey="6LeagXYkAAAAAO4pyoo0TzNgNGidnVAgzMbJkREc" data-callback="onSubmit"  >
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </div>

                    <form>
                </div>
        </div>
    </div>
</div>
<!-- <script>
    grecaptcha.ready(function() {
        document.getElementById('conventionForm').addEventListener("submit", function(event) {
            event.preventDefault();
            grecaptcha.execute('{{ config('
                services.recaptcha.site_key ')}}', {
                    action: 'register'
                }).then(function(token) {
                document.getElementById("recaptcha_token").value = token;
                document.getElementById('conventionForm').submit();
            });
        });
    });
</script> -->
@endsection