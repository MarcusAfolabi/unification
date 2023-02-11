@extends('layouts.main')
@section('title', 'Convention Registration')
@section('description', 'C & S Church Unification Campus Fellowship Annual Convention registration is now open. Visit
the official website to register, choose your current level and make payment using the secured platform.')
@section('keywords', 'unification campus fellowship, eventbrite, register, isokan, unification, campers, december,
november, october 1, church, fellowship, prayering, adura, subconvention, praying ground, mountain, retreat, family
reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')
@section('main')
<div class="main_content">
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

    <div
        class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">

        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> CONVENTION 2023 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Ensure to provide accurate information and
                proceed to make payment</div>
        </div>
    </div>
    <div class="mcontainer">

        <div class="max-w-7x7 mx-auto p-7">
            <div class="-mt-16 bg-white p-10 relative rounded-md shadow">
                <form method="POST" action="{{ route('convention.store') }}" id="conventionForm"
                    enctype="multipart/form-data">
                    <x-jet-validation-errors class="mb-4" />
                    <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">
                        @csrf
                        <div class="line">
                            <input class="line__input" id="firstname" autocomplete="off" name="firstname" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('firstname') }}">
                            <span for="firstname" class="line__placeholder"> First Name </span>
                        </div>

                        <div class="line">
                            <input class="line__input" id="lastname" autocomplete="off" name="lastname" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('lastname') }}">
                            <span for="lastname" class="line__placeholder"> Last Name </span>
                        </div>

                        <div class="line">
                            <input class="line__input" id="email" autocomplete="off" name="email" type="email"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}">
                            <span for="email" class="line__placeholder"> Email </span>
                        </div>

                        <div class="line">
                            <input class="line__input" id="phoneNumber" autocomplete="off" name="phoneNumber"
                                type="number" onkeyup="this.setAttribute('value', this.value);"
                                value="{{ old('phoneNumber') }}">
                            <span for="phoneNumber" class="line__placeholder"> Contact number </span>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <select id="gender" class="selectpicker   with-border" name="gender"
                                    value="{{ old('gender') }}">
                                    <option value="{{ old('gender') }}" disabled selected>Select Gender </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <select id="yourFellowship" class="selectpicker  with-border" name="yourFellowship">
                                    <option selected disabled value="{{ old('yourFellowship') }}"> Your Chapter
                                    </option>
                                    @foreach (App\Models\Institution::select('name')->latest()->get() as $institution)
                                    <option value="{{$institution->name}}">{{ ucwords($institution->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <select id="unit_in_fellowship" class="selectpicker  with-border"
                                    name="unit_in_fellowship">
                                    <option selected disabled value="{{ old('unit_in_fellowship') }}"> Your Unit
                                    </option>
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
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <select id="qualification" class="selectpicker mt-2 with-border" name="qualification">
                                    <option selected disabled value="{{ old('unit_in_fellowship') }}"> Your Current
                                        Degree </option>
                                    <option value="BSc"> BSc </option>
                                    <option value="HND"> HND </option>
                                    <option value="MBBS"> MBBS </option>
                                    <option value="BDS"> BDS </option>
                                    <option value="BchD"> BchD </option>
                                    <option value="MSc"> MSc </option>
                                    <option value="OND"> OND </option>
                                    <option value="PhD"> PhD </option>
                                    <option value="PGD"> PGD </option>
                                    <option value="MBA"> MBA </option>
                                    <option value="Diploma"> Diploma </option>
                                    <option value="SSCE"> SSCE </option>
                                </select>
                            </div>
                        </div>

                        <div class="line">
                            <input class="line__input" id="profile_image" autocomplete="off" name="profile_image"
                                type="file" onkeyup="this.setAttribute('value', this.value);" accept="image/*"
                                value="{{ old('profile_image') }}">
                            <span for="profile_image" class="line__placeholder"> ID Card Photo </span>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('convention.payment') }}">
                                {{ __('Already registered? Make Payment Now') }}
                            </a>

                            <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                                <button type="submit" class="button bg-danger-600"> Register </button>
                            </div>
                        </div>
                    </div>
                    <form>
            </div>
        </div>
    </div>
</div>
@endsection