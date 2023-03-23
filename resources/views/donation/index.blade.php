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
                <div class="my-2 flex items-center justify-between pb-3">
                    <div>
                        <h2 class="text-xl font-semibold"> Your friends are donating</h2>
                    </div>
                    <a class="text-blue-500" href="#modal-donation" uk-toggle><ion-icon name="heart-circle" class="text-lg"></ion-icon> Donate
                    </a>
                </div>
                <div class="divide-y divide-gray-100 card px-5 py-2">
                    @foreach($fundlists as $fundlist)
                    <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                        <a href="{{ route('fundraise.show', $fundlist) }}" class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                            <img src="{{ asset('storage' . $fundlist->image) }}" alt="{{ $fundlist->title }}" class="w-full h-full absolute inset-0 object-cover">
                        </a>
                        <div class="flex-1 relative sm:mt-0 mt-4">
                            <a href="{{ route('fundraise.show', $fundlist) }}" class="text-lg font-semibold line-clamp-2">{{ $fundlist->title }} </a>
                            <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">CEC</a> </div>
                            <div class="mt-1 text-sm font-medium"> 620 Donated</div>
                            <div class="mt-3">
                                <div class="text-blue-500 font-medium mb-2"> <span> 2,429,000</span> <span> of</span> <span> {{ $fundlist->target }}</span> Raised </div>
                                <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                    <div class="bg-blue-600 w-1/3 h-full"></div>

                                </div>

                            </div>

                        </div>
                        <a href="#modal-donation" uk-toggle class="text-blue-500"> Donate now </a>

                    </div>
                    @endforeach
                </div>
            </div>
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
                </ul>


            </div>
        </div>
    </div>
</div>
</div>
<div id="modal-donation" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Make a donation</h2>
        </div>

        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" required name="customer[name]" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="on">
                    <span for="name" class="line__placeholder"> Name </span>
                </div>

                <div class="line">
                    <input class="line__input" id="email" required name="customer[email]" type="email" onkeyup="this.setAttribute('value', this.value);" value="{{ old('email') }}" autocomplete="on">
                    <span for="email" class="line__placeholder"> Email </span>
                </div>
                <input type="hidden" name="public_key" value="FLWPUBK_TEST-6624206f3ef249fc7901c1ae8eaf98ee-X" />
                <input type="hidden" name="tx_ref" value="cnsunification-019203" />
                <input type="hidden" name="currency" value="NGN" />
                <input type="hidden" name="redirect_url" value="https://unification.test/redirect/" />
                <input type="hidden" name="meta[token]" value="54" />
                <div class="line">
                    <input class="line__input" id="amount" required name="amount" type="number" onkeyup="this.setAttribute('value', this.value);" value="{{ old('amount') }}" autocomplete="on">
                    <span for="amount" class="line__placeholder"> Amount </span>
                </div>
                <div class="line">
                    <select id="category" name="category" class="shadow-none selectpicker with-border">
                        @foreach($funds as $fund)
                        <option value="{{ $fund->id }}">{{ $fund->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="line">
                    <textarea class="line__input" id="description" required name="description" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('description') }}" autocomplete="off"></textarea>
                    <span for="description" class="line__placeholder"> Description </span>
                </div>
                <br>
                <br>
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                <p class="text-sm leading-6"> </p>
                <button class="button blue" onclick="payWithFlutterwave()" type="submit">Donate now</button>
            </div>
        </form>

    </div>
</div>
@endsection