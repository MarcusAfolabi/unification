@extends('layouts.main')
@section('title', 'Edit Profile')
@section('description', 'Update your account\'s profile information and email address.')
@section('main')
<div class="h-full"> 
    <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
            </aside>
            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <br>
                <form action="{{ route('user.updateMember', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="sm:col-span-6">
                        <label for="photo" class="block text-sm font-medium text-blue-blue-900"> </label>
                        <div class="mt-1 flex items-center">
                            <img class="inline-block h-24 w-24 rounded-full" src="{{ ($user->profile_photo_url) }}" alt="{{ $user->name }}" title="{{ $user->name }}">
                            <div class="ml-4 flex">
                                <div class="relative bg-white py-2 px-3 border border-blue-blue-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-blue-blue-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-blue-50 focus-within:ring-blue-500">
                                    <label for="user-photo" class="relative text-sm font-medium text-blue-blue-900 pointer-events-none">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                    </label>
                                    <input id="profile_photo_path" name="profile_photo_path" accept="image/*" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-blue-300 rounded-md">
                                </div>
                                <!-- <button type="button" class="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-blue-blue-900 hover:text-blue-blue-700 focus:outline-none focus:border-blue-blue-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-blue-50 focus:ring-blue-500">Remove</button> -->
                            </div>
                        </div>
                    </div>
                    <section aria-labelledby="payment-details-heading">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="bg-white py-6 px-4 sm:p-6">
                                <div>
                                    <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-blue-900">Basic details</h2>
                                    <p class="mt-1 text-sm text-blue-500">Update your account's profile information and email address.</p>
                                </div>

                                <div class="mt-6 grid grid-cols-4 gap-6">
                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="first-name" class="block text-sm font-medium text-blue-700">First name</label>
                                        <input type="text" name="name" id="first-name" value="{{ $user->name }}" autocomplete="cc-given-name" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="last-name" class="block text-sm font-medium text-blue-700">Last name</label>
                                        <input type="text" name="lastname" value="{{ $user->lastname }}" id="lastname" autocomplete="cc-family-name" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="email-address" class="block text-sm font-medium text-blue-700">Email address</label>
                                        <input type="email" name="email" readonly value="{{ $user->email }}" id="email" autocomplete="email" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="expiration-date" class="block text-sm font-medium text-blue-700">Phone number</label>
                                        <input type="tel" name="phone" value="{{ $user->phone }}" id="phone" autocomplete="tel" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="unit_id" class="block text-sm font-medium text-blue-700">
                                            <span>Unit</span>
                                        </label>
                                        <select name="unit_id" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $user->unit->id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="academic_status" class="block text-sm font-medium text-blue-700">Graduate</label>
                                        <select name="academic_status" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            <option selected disabled value="">Graduate? Please Select</option>
                                            <option value="Graduate" {{ $user->academic_status == 'Graduate' ? 'selected' : '' }}>Yes, Graduate</option>
                                            <option value="Postgraduate" {{ $user->academic_status == 'Postgraduate' ? 'selected' : '' }}>No, Postgraduate</option>
                                            <option value="Undergraduate" {{ $user->academic_status == 'Undergraduate' ? 'selected' : '' }}>No, Undergraduate</option>
                                        </select>
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="fellowship_status" class="block text-sm font-medium text-blue-700">
                                            <span>Unification Post</span>
                                        </label>
                                        <select name="fellowship_status" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            <option value="{{ $user->fellowship_status }}">{{ $user->fellowship_status }}</option>
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

                                        </select>
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="qualification_one" class="block text-sm font-medium text-blue-700">
                                            <span>Highest Quaification</span>
                                        </label>
                                        <select name="qualification_one" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            <option value="Diploma" {{ $user->qualification_one == 'Diploma' ? 'selected' : '' }}> Diploma</option>
                                            <option value="SSCE" {{ $user->qualification_one == 'SSCE' ? 'selected' : '' }}> SSCE</option>
                                            <option value="OND" {{ $user->qualification_one == 'OND' ? 'selected' : '' }}> OND</option>
                                            <option value="BSc" {{ $user->qualification_one == 'BSc' ? 'selected' : '' }}> BSc</option>
                                            <option value="HND" {{ $user->qualification_one == 'HND' ? 'selected' : '' }}> HND</option>
                                            <option value="MBBS" {{ $user->qualification_one == 'MBBS' ? 'selected' : '' }}> MBBS</option>
                                            <option value="BDS" {{ $user->qualification_one == 'BDS' ? 'selected' : '' }}> BDS</option>
                                            <option value="BchD" {{ $user->qualification_one == 'BchD' ? 'selected' : '' }}> BchD</option>
                                            <option value="MSc" {{ $user->qualification_one == 'MSc' ? 'selected' : '' }}> MSc</option>
                                            <option value="PhD" {{ $user->qualification_one == 'PhD' ? 'selected' : '' }}> PhD</option>
                                            <option value="PGD" {{ $user->qualification_one == 'PGD' ? 'selected' : '' }}> PGD</option>
                                            <option value="MBA" {{ $user->qualification_one == 'MBA' ? 'selected' : '' }}> MBA</option>
                                        </select>
                                    </div>


                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="course_one" class="block text-sm font-medium text-blue-700">Degree Institution </label>
                                        <input type="text" name="course_one" value="{{ $user->course_one }}" id="course_one" autocomplete="school" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>
                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="degree_one" class="block text-sm font-medium text-blue-700"> Degree</label>
                                        <input type="text" name="degree_one" value="{{ $user->degree_one }}" id="degree_one" autocomplete="degree" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="fellowship_id" class="block text-sm font-medium text-blue-700">Fellowship</label>
                                        <select id="fellowship_id" name="fellowship_id" autocomplete="fellowship_id" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            @foreach($fellowships as $fellowship)
                                            <option value="{{ $fellowship->id }}" {{ ($user->fellowship->name) == $fellowship->id ? 'selected' : '' }}>
                                                {{ $fellowship->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="professional_skill" class="block text-sm font-medium text-blue-700"> Skills</label>
                                        <input type="text" name="professional_skill" value="{{ $user->professional_skill }}" id="professional_skill" autocomplete="professional_skill" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>
                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="occupation" class="block text-sm font-medium text-blue-700">Occupation </label>
                                        <input type="text" name="occupation" value="{{ $user->occupation }}" id="occupation" autocomplete="occupation" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-1">
                                        <label for="gender" class="block text-sm font-medium text-blue-700">Gender</label>
                                        <select id="gender" name="gender" autocomplete="gender" class="mt-1 block w-full bg-white border border-blue-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-blue-900 focus:border-blue-900 sm:text-sm">
                                            <option value="{{ $user->gender }}" {{ ($user->gender) == $user->gender ? 'selected' : '' }}> Male </option>
                                            <option value="{{ $user->gender }}" {{ ($user->gender) == $user->gender ? 'selected' : '' }}> Female </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-blue-50 text-right sm:px-6">
                                @if (session('status'))
                                <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                                    {{ session('status') }}
                                </p>
                                @endif
                                <button type="submit" class="bg-blue-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">Update</button>
                            </div>
                        </div>
                    </section>
                </form>
                <form action="{{ route('user.updatePassword', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="bg-white py-6 px-4 sm:p-6">
                            <div>
                                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Update password</h2>
                                <p class="mt-1 text-sm text-gray-500">Ensure your account is using a long, random password to stay secure.</p>
                            </div>

                            <div class="mt-6 grid grid-cols-4 gap-4">
                                <div hidden class="col-span-4 sm:col-span-2">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input id="current_password" type="password" class="mt-1 block w-full with-border shadow-sm" autocomplete="current-password" />
                                </div>

                                <div class="col-span-4 sm:col-span-2">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input id="password" name="password" type="password" class="mt-1 block w-full with-border shadow-sm" autocomplete="new-password" />
                                </div>
                                <div class="col-span-4 sm:col-span-2">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full with-border shadow-sm" autocomplete="new-password" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-blue-50 text-right sm:px-6">
                            @if (session('pass'))
                            <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                                {{ session('pass') }}
                            </p>
                            @endif
                            <button type="submit" class="bg-blue-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">Update</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </main>
</div>
@endsection