@extends('layouts.main')
@section('title', 'Convention Registration')
@section('description', 'Register for the coming convention and ensure to make payment as onsite payment would not be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')

@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
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
            <form method="POST" action="{{ route('convention.store') }}" id="conventionForm" enctype="multipart/form-data">
                <x-jet-validation-errors class="mb-4" />
                <div class="">
                    @csrf
                    <div class="">@csrf <input type="hidden" class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">
                        <div class="line mb-4"><input class="line__input" id="email" required autofocus name="firstname" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('firstname')}}" autocomplete="off"><span for="name" class="line__placeholder">Name </span></div>
                        <div class="line mb-4"><input class="line__input" id="lastname" required autofocus name="lastname" type="lastname" onkeyup="this.setAttribute('value', this.value);" value="{{ old('lastname')}}" autocomplete="off"><span for="lastname" class="line__placeholder">Last name </span></div>
                        <div class="line mb-4"><input class="line__input" id="email" required autofocus name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email')}}" autocomplete="off"><span for="email" class="line__placeholder">Email </span></div>
                        <div class="line mb-4"><select type="text" placeholder="Gender" name="gender" class="selectpicker">
                                <option value="{{ old('gender')}}">Select Gender </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select></div>
                        <div class="line mb-4"><input class="line__input" id="tel" required autofocus name="phone" type="tel" onkeyup="this.setAttribute('value', this.value);" value="{{ old('phoneNumber')}}" autocomplete="off"><span for="phoneNumber" class="line__placeholder">Phone Number </span>
                        </div>
                        <div class="line mb-4"><select type="text" placeholder="Graduate ?" name="academic_status" class="selectpicker">
                                <option selected disabled value="{{ old('academic_status')}}">Graduate? Pls Select </option>
                                <option value="Graduate">Yes, Graduate </option>
                                <option value="Postgraduate">No, Postgraduate </option>
                                <option value="Undergraduate">No, Undergraduate </option>
                            </select></div>
                            <div class="line mb-4"><select type="text" placeholder="Fellowship Name?" name="fellowship_id" class="selectpicker">
                                <option selected disabled value="{{ old('yourFellowship')}}">Fellowship Name? Pls Select
                                </option>@foreach ($fellowships as $fellowship) <option value="{{$fellowship->id}}">{{$fellowship->name}}</option>@endforeach <option value="{{ old('fellowship_id')}}">{{ old('yourFellowship')}}</option>
                                <option value="Abraham Adesanya Polytechnic, Ijebu Igbo.">Abraham Adesanya Polytechnic,
                                    Ijebu Igbo. </option>
                                <option value="Zenith University, Ghana">Zenith University, Ghana </option>
                            </select></select></div>
                        <div class="line mb-4"><select type="text" placeholder="Fellowship Post?" name="fellowship_status" class="selectpicker">
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
                        
                        <div class="line mb-4"><select type="text" placeholder="Fellowship Name?" name="fellowship_unit" class="selectpicker">
                                <option selected disabled value="{{ old('unit_in_fellowship')}}">Unit in Fellowship? Pls
                                    Select </option>
                                <option value="Drama Unit">Drama Unit </option>
                                <option value="Choir Unit">Choir Unit </option>
                                <option value="Decorating Unit">Decorating Unit </option>
                                <option value="Usering Unit">Usering Unit </option>
                                <option value="Levites Unit">Levites Unit </option>
                                <option value="Prayer Unit">Prayer Unit </option>
                                <option value="Bible Unit">Bible Unit </option>
                                <option value="Evangelism Unit">Evangelism Unit </option>
                                <option value="Academic Unit">Academic Unit </option>
                                <option value="Media/Publicity Unit">Media/Publicity Unit </option>
                                <option value="OTHER">OTHERS </option>
                            </select></div>

                        <input type="file" placeholder="Profile Photo" uk-tooltip="Profile Photo" class="form-control with-border" accept="image/*" name="profile_image" />
                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-blue-600 hover:text-blue-900" href="{{ route('convention.payment') }}">
                                {{ __('Already registered? Make Payment Now') }}
                            </a>

                            <x-jet-button class="ml-5">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </div>
                    <form>
                </div>
        </div>
    </div>
</div> 
<script>
grecaptcha.ready(function() {
    document.getElementById('registerForm').addEventListener("submit", function(event) {
        event.preventDefault();
        grecaptcha.execute('{{ config('
            services.recaptcha.site_key ')}}', {
                action: 'register'
            }).then(function(token) {
            document.getElementById("recaptcha_token").value = token;
            document.getElementById('registerForm').submit();
        });
    });
});
</script>
@endsection