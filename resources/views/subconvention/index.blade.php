@extends('layouts.main')
@section('title', 'Sub Convention Registration')
@section('description', 'Register for the coming sub convention and ensure to make payment as onsite payment would not be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/subconvention')

@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> SUB - CONVENTION 2023 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Ensure to provide accurate information and
                proceed to make payment</div>
        </div>
    </div>
    <form method="POST" action="{{ route('subconvention.store') }}" enctype="multipart/form-data">
        <div class="mcontainer">
            <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
                <x-jet-validation-errors class="mb-4" />
                <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">
                    @csrf
                    <input type="text" placeholder="First name" value="{{ old('firstname') }}" name="firstname" class="with-border">
                    <input type="text" placeholder="Last name" value="{{ old('lastname') }}" name="lastname" class="with-border">
                    <input type="email" placeholder="Email" value="{{ old('email') }}" name="email" class="with-border">
                    <input type="tel" placeholder="Phone no" value="{{ old('phone') }}" name="phone" maxlength="11" id="phone" pattern="^0(?:70|71|80|81|90|91)[0-9]{8}$" class="shadow-none mt-0 px-5 with-border">

                    <select type="text" placeholder="Gender" name="gender" class="shadow-none selectpicker with-border">
                        <option value="{{ old('gender') }}"> {{ old('gender') }} Select Gender </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>


                    <select type="text" name="fellowship_id" class="shadow-none selectpicker with-border">
                        <option disabled value="{{ old('fellowship_id') }}">Select your fellowship </option>
                        @foreach (App\Models\Fellowship::all() as $institution)
                        <option value="{{$institution->name}}">{{$institution->name}}</option>
                        @endforeach
                    </select>

                    <select type="text" name="academic_status" class="shadow-none selectpicker with-border">
                        <option disabled value="{{ old('academic_status') }}"> Select your level in school </option>
                        <option value="Pre-ND"> Pre-ND </option>
                        <option value="Pre-Degree"> Pre-Degree </option>
                        <option value="HND1"> HND1 </option>
                        <option value="HND2"> HND2 </option>
                        <option value="ND1"> ND1 </option>
                        <option value="ND2"> ND2 </option>
                        <option value="100 Level"> 100 Level</option>
                        <option value="200 Level"> 200 Level</option>
                        <option value="300 Level"> 300 Level</option>
                        <option value="400 Level"> 400 Level</option>
                        <option value="500 Level"> 500 Level</option>
                        <option value="600 Level"> 600 Level</option>
                        <option value="Graduate"> Graduate </option>
                        <option value="Post Graduate"> Post Graduate </option>

                    </select>

                    <select type="text" name="fellowship_status" class="shadow-none selectpicker with-border">
                        <option disabled value="{{ old('fellowship_status') }}">Select your fellowship post </option>
                        <option value="ASSISTANT SECRETARY"> ASSISTANT SECRETARY </option>
                        <option value="CHOIR MASTER/MISTRESS"> CHOIR MASTER/MISTRESS </option>
                        <option value="EVANGELISM SECRETARY"> EVANGELISM SECRETARY </option>
                        <option value="FEMALE CO-ORDINATOR"> FEMALE CO-ORDINATOR </option>
                        <option value="FINANCIAL SECRETARY"> FINANCIAL SECRETARY </option>
                        <option value="LEVITE CO-ORDINATOR"> LEVITE CO-ORDINATOR </option>
                        <option value="PRAYER MINISTRY LEADER"> PRAYER MINISTRY LEADER </option>
                        <option value="PRESIDENT"> PRESIDENT </option>
                        <option value="PUBLICITY SECRETARY"> PUBLICITY SECRETARY </option>
                        <option value="SECRETARY"> SECRETARY </option>
                        <option value="TREASURY SECRETARY"> TREASURY SECRETARY </option>
                        <option value="VICE PRESIDENT"> VICE PRESIDENT </option>
                        <option value="WELFARE SECRETARY"> WELFARE SECRETARY </option>
                        <option value="MEMBER"> MEMBER </option>
                        <option value="OTHERS"> OTHERS </option>
                    </select>


                    <select type="text" name="unit_id" class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('unit_id') }}">Select your unit in the fellowship </option>
                        <option value="Drama Unit"> Drama Unit </option>
                        <option value="Choir Unit"> Choir Unit </option>
                        <option value="Decorating Unit"> Decorating Unit </option>
                        <option value="Usering Unit"> Usering Unit </option>
                        <option value="Levites Unit"> Levites Unit </option>
                        <option value="Prayer Unit"> Prayer Unit </option>
                        <option value="Bible Unit"> Bible Unit </option>
                        <option value="Evangelism Unit"> Evangelism Unit </option>
                        <option value="Academic Unit"> Academic Unit </option>
                        <option value="Media/Publicity Unit"> Media/Publicity Unit </option>
                        <option value="OTHER"> OTHERS </option>
                    </select>

                    <div class="flex items-center text-center justify-between mt-6">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('subconvention.payment') }}">
                            {{ __('Already registered? Make Payment Now') }}
                        </a>

                        <x-jet-button class="ml-5 justify-end">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection