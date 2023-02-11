@extends('layouts.main')
@section('title', 'Donation')
@section('description', 'God loves a cheerful giver. Donate to the buiding of the church and her needs')
@section('keywords', 'donation, helping hands, help, donating, giving, fund raising, empowerment')
@section('canonical', 'https://cnsunification.org/donation')

@section('main')
<div class="main_content">
    <div class="mcontainer">

        <div class="lg:flex lg:space-x-10">

            <div class="lg:w-2/3">
                <div class="flex justify-between items-center relative md:mb-4 mb-3">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold"> Donations </h2>
                    </div>

                </div>

                <div class="divide-y divide-blue-100 card px-5 py-2">

                    <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                        <div class="p-10 space-y-7">
                            <div class="line">
                                <input class="line__input" id="name" name="customer[name]" type="text"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                    autocomplete="off">
                                <span for="name" class="line__placeholder"> Your Name </span>
                            </div>
                            @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div class="line">
                                <input class="line__input" id="institution" name="institution" type="text"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('institution') }}"
                                    autocomplete="off">
                                <span for="institution" class="line__placeholder"> Your Fellowship </span>
                            </div>
                            @error('institution')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div class="line">
                                <input class="line__input" id="email" name="customer[email]" type="email"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}"
                                    autocomplete="off">
                                <span for="email" class="line__placeholder"> Your Email </span>
                            </div>
                            @error('email')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div class="line">
                                <input class="line__input" id="phone_number" name="phone_number" type="phone_number"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('phone_number') }}"
                                    autocomplete="off">
                                <span for="phone_number" class="line__placeholder"> Your Phone Number </span>
                            </div>
                            @error('phone_number')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror

                            <div>

                            </div>
                            <div>
                                <label for="category"> Payment Category </label>
                                <select id="category" name="category" class="shadow-none selectpicker with-border">
                                    <option value="{{ old('category') }}">{{ old('category') }}</option>
                                    <option value="Anniversary Due">Anniversary Due/Offering/Seed</option>
                                    <option value="Convention Fee">Convention Fee</option>
                                    <option value="Donation">Donation/Church Building</option>
                                    <option value="Fundraising">Fundraising</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            @error('payment_category')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror

                            <div>
                                <label for="type"> Payment Type </label>
                                <select id="type" name="type" class="shadow-none selectpicker with-border">
                                    <option value="{{ old('type') }}">{{ old('type') }}</option>
                                    <option value="Undergraduate">Undergraduate</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="Fundraising">Just Donation</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            @error('type')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror

                            <div class="line">
                                <input class="line__input" id="number" name="amount" minlength="4" max="6" type="number"
                                    onkeyup="this.setAttribute('value', this.value);" value="{{ old('amount') }}"
                                    autocomplete="off">
                                <span for="amount" class="line__placeholder"> Amount (N) </span>
                            </div>
                            @error('amount')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror

                            <div class="form-group">
                                <textarea class="form-group with-border shadow px-3 py-3" name="illustration" placeholder="Payment Illustration" rows="5"
                                    cols="30">
                                {{ old('explain') }}</textarea>

                            </div>
                            @error('explain')
                            <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <input type="hidden" name="public_key" value="FLWPUBK-55fcd019edf21bb30ebbfa9c70cfc53b-X" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="meta[token]" value="54" />
                            <input type="hidden" name="tx_ref" value="bitethtx-019203" />
                            <input type="hidden" name="meta[token]" value="54" />
                            <!--<input type="hidden" name="redirect_url" value="http://127.0.0.1:8000/" />-->
                            <input type="hidden" name="redirect_url" value="https://cnsunification.org/donation" />

                        </div>
                        <!-- form footer -->
                        <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                            <p class="text-sm leading-6"> You will be forwarded to our secured payment platform.
                                Ensure your email is valid to receive payment receipt. Thank You</p>
                            <button class="button dark" id="start-payment-button" type="submit">DONATE </button>
                        </div>



                    </form>
                    <!--<form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">-->
                    <!--    <div>-->
                    <!--      Your order is ₦3,400-->
                    <!--    </div>-->
                    <!--    <input type="hidden" name="public_key" value="FLWPUBK_TEST-SANDBOXDEMOKEY-X" />-->
                    <!--    <input type="hidden" name="customer[email]" value="jessepinkman@walterwhite.org" />-->
                    <!--    <input type="hidden" name="customer[name]" value="Jesse Pinkman" />-->
                    <!--    <input type="hidden" name="tx_ref" value="bitethtx-019203" />-->
                    <!--    <input type="hidden" name="amount" value="3400" />-->
                    <!--    <input type="hidden" name="currency" value="NGN" />-->
                    <!--    <input type="hidden" name="meta[token]" value="54" />-->
                    <!--    <input type="hidden" name="redirect_url" value="https://demoredirect.localhost.me/" />-->
                    <!--    <button type="submit" id="start-payment-button">Pay Now</button>-->
                    <!--  </form> -->
                </div>
                <div class="my-2 flex items-center justify-between pb-3">
                    <div>
                        <h2 class="text-xl font-semibold"> Your Friends are donating</h2>
                    </div>
                </div>
                <div class="relative" uk-slider="finite: true">
                    <div class="uk-slider-container px-1 py-3">
                        <ul
                            class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

                            <li>
                                <a href="{{ url('donation') }}" class="uk-link-reset">
                                    <div class="card">
                                        <div class="card-media h-28">
                                            <div class="card-media-overly"></div>
                                            <img src="{{ asset('assets/images/funding/funder-4.jpg') }}" alt=""
                                                class="">
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ url('donation') }}"
                                                class="font-semibold line-clamp-2 mb-2">Cancer of the Anus</a>

                                            <div class="font-medium text-sm text-blue-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                562 People donated
                                            </div>

                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-blue-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('donation') }}" class="uk-link-reset">
                                    <div class="card">
                                        <div class="card-media h-28">
                                            <div class="card-media-overly"></div>
                                            <img src="{{ asset('assets/images/funding/funder-4.jpg') }}" alt=""
                                                class="">
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ url('donation') }}"
                                                class="font-semibold line-clamp-2 mb-2">Unification WASIMI Building</a>

                                            <div class="font-medium text-sm text-blue-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                109 People donated
                                            </div>

                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-blue-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>

                        <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-blue-800 dark:text-white"
                            href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                        <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-blue-800 dark:text-white"
                            href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 w-full lg:mt-0 mt-7">

                <div class="card mb-6">
                    <div class="card-media h-28">
                        <div class="card-media-overly"></div>
                        <img src="{{ asset('assets/images/funding/funder-4.jpg') }}" alt="" class="">
                    </div>
                    <div class="p-5">
                        <h4 class="text-xl font-semibold mb-1"> Do Your Part </h4>
                        <p class="font-medium"> Fundraiser make it easy to support friends, family and the causes
                            that are important to you such as:</p>

                        <div class="mt-4 text-base font-medium space-y-2">
                            <div class="flex items-center">
                                <ion-icon name="medkit" class="text-lg mr-3"></ion-icon> Medical
                            </div>
                            <div class="flex items-center">
                                <ion-icon name="school" class="text-lg mr-3"></ion-icon> Education
                            </div>
                            <div class="flex items-center">
                                <ion-icon name="heart-circle" class="text-lg mr-3"></ion-icon> Church Building and
                                more
                            </div>
                        </div>
                        <a href="#" class="bg-blue-100 rounded-lg text-center py-2 block mt-6 font-medium"> Donate
                            Now</a>
                    </div>
                </div>
                <div>
                    <div class="text-xl font-semibold mb-1"> We're here to help</div>
                    <div class="text-blue-400"> Answers to common questions about fundraisers </div>
                </div>

                <ul class="space-y-3.5 mt-5" uk-accordion>
                    <li class="uk-open bg-blue-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">Who can donate?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>People from all over the world can donate to Cherubim and Seraphim Church Unification
                                Campus Fellowship.</p>
                        </div>
                    </li>
                    <li class="bg-blue-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">What payment method are available
                            to receive donations?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Currently, your payment will be processed by flutterwave, entering your mastercard,
                                verve, visa details in a secured browsing session. For Huge Bank transer</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> Request for Bank account
                                number</a>
                        </div>
                    </li>
                    <li class="bg-blue-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">Can a non student of the fold
                            donate?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Yes! you can donate to support the convention, conferences and the church convention
                                building at Wasimi</p>
                        </div>
                    </li>
                    {{-- <li class="bg-blue-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">How do fees work?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                        </div>
                    </li> --}}
                </ul>

            </div>

        </div>

    </div>
</div> 
@endsection