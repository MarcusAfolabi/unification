@extends('layouts.main')@section('title', 'Membership Registration')@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key')}}"></script>
<div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">Membership Registration</div>
            <div class="text-white text-lg font-medium text-opacity-90">Ensure your information are accurate
            </div>
        </div>
    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST" id="register" action="{{ route('register')}}" >
                <x-jet-validation-errors class="mb-4" />
                <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">
                    @csrf 
                    <input hidden id="recaptcha_token" name="recaptcha_token">
                    <div class="line"><input class="line__input"  id="name" autofocus name="name" type="name" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name')}}" autocomplete="off"><span for="name" class="line__placeholder">First Name </span></div>
                    <div class="line"><input class="line__input"  id="lastname" autofocus name="lastname" type="lastname" onkeyup="this.setAttribute('value', this.value);" value="{{ old('lastname')}}" autocomplete="off"><span for="lastname" class="line__placeholder">Last name </span></div>
                    <div class="line"><input class="line__input"  id="email" autofocus name="email" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email')}}" autocomplete="off"><span for="email" class="line__placeholder">Email </span></div>
                    <div class="line"><select type="text"  placeholder="Gender" name="gender" class="selectpicker">
                            <option value="{{ old('gender')}}">Select Gender </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select></div>
                    <div class="line"><input class="line__input"  id="tel" autofocus name="phone" type="tel" onkeyup="this.setAttribute('value', this.value);" value="{{ old('phoneNumber')}}" autocomplete="off"><span for="phoneNumber" class="line__placeholder">Phone Number </span>
                    </div>

                    <div class="line"><input class="line__input"  id="address" autofocus name="address" type="address" onkeyup="this.setAttribute('value', this.value);" value="{{ old('contact_address')}}" autocomplete="off"><span for="contact_address" class="line__placeholder">Home/Hostel address </span></div>
                    <div class="line"><select type="text" placeholder="Graduate ?" name="academic_status" class="selectpicker">
                            <option selected disabled value="{{ old('academic_status')}}">Graduate? Pls Select </option>
                            <option value="Graduate">Yes, Graduate </option>
                            <option value="Postgraduate">No, Postgraduate </option>
                            <option value="Undergraduate">No, Undergraduate </option>
                        </select></div>

                    <div class="line"><select name="fellowship_status"  class="selectpicker">
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
                    <div class="line"><select name="fellowship_id"  class="selectpicker">
                            <option selected disabled value="{{ old('fellowship_id')}}">Fellowship Name? Pls Select </option>
                            @foreach (App\Models\Fellowship::select('id', 'name')->latest()->get() as $fellowship) <option value="{{$fellowship->id}}">{{$fellowship->name}}</option>@endforeach
                            <option value="1">Example</option>
                        </select>
                    </div>
                    <div class="line"><select name="unit_id"  class="selectpicker">
                            <option selected disabled>Unit in Fellowship? Pls
                                Select </option>
                            @foreach(App\Models\Unit::all() as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }} </option>
                            @endforeach
                        </select></div>
                    <div class="line"><select name="qualification_one"  class="selectpicker">
                            <option selected disabled value="{{ old('qualification_one')}}">Other Qualification?
                                Pls Select </option>
                            <option value="Diploma">Diploma </option>
                            <option value="SSCE">SSCE </option>
                            <option value="OND">OND </option>
                            <option value="BSc">BSc </option>
                            <option value="HND">HND </option>
                            <option value="MBBS">MBBS </option>
                            <option value="BDS">BDS </option>
                            <option value="BchD">BchD </option>
                            <option value="MSc">MSc </option>
                            <option value="PhD">PhD </option>
                            <option value="PGD">PGD </option>
                            <option value="MBA">MBA </option>
                        </select></div>
                    <div class="line"><input class="line__input"  id="degree_one" autofocus name="degree_one" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('degree_one')}}" autocomplete="off"><span for="degree_one" class="line__placeholder">The Institution
                        </span></div>
                    <div class="line"><input class="line__input"  id="course_one" autofocus name="course_one" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('course_one')}}" autocomplete="off"><span for="course_one" class="line__placeholder">Course Of
                            Study </span></div>
                    <div class="line"><input class="line__input"  id="password" name="password" type="password" autocomplete="current-password" onkeyup="this.setAttribute('value', this.value);" value="{{ old('password')}}" autocomplete="off"><span for="password" class="line__placeholder">Password </span></div>
                    <div class="line"><input class="line__input" id="password" name="password_confirmation" type="password" autocomplete="current-password" onkeyup="this.setAttribute('value', this.value);" value="{{ old('password')}}" autocomplete="off"><span for="password" class="line__placeholder">Confirm Password </span>
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    <div class="md:col-span-2 md:flex items-center justify-between">
                        <div>
                            <div class="checkbox"><input type="checkbox" required name="remember_me"  id="chekcbox2"><label for="chekcbox2"><span class="checkbox-icon"></span><span class="font-medium text-blue-400">I belong to this fold and my information is
                                        accurate, &amp; agreed to <a href="policy">policy</a> of the
                                        church.</span></label></div>
                        </div>
                    </div>
                    <div class="flex">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                            Become a member
                        </button>
                    </div>
                </div>
                <form>
        </div>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmit(token) {
        document.getElementById("register").submit();
    }
</script>
 @endsection