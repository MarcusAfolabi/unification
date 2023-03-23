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
                    <a uk-tooltip="Add" class="text-blue-500" href="#modal-donation" uk-toggle><i class="icon-material-outline-add"></i> New
                    </a>
                </div>
                <div class="divide-y divide-gray-100 card px-5 py-2">
                    <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                        <a href="timeline-fundraiser.html" class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                            <img src="assets/images/funding/funder-3.jpg" alt="" class="w-full h-full absolute inset-0 object-cover">
                        </a>
                        <div class="flex-1 relative sm:mt-0 mt-4">
                            <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2"> Racing to End Duchenne </a>
                            <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Alex Dolgove</a> </div>
                            <div class="mt-1 text-sm font-medium"> 620 Donated</div>
                            <div class="mt-3">
                                <div class="text-blue-500 font-medium mb-2"> <span> 2,429,000</span> <span> of</span> <span> 32,000,000</span> Raised </div>
                                <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                    <div class="bg-blue-600 w-1/3 h-full"></div>

                                </div>

                            </div>

                        </div>
                        <a href="#" class="text-blue-500"> Donate now </a>

                    </div>
                    <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                        <a href="timeline-fundraiser.html" class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                            <img src="assets/images/funding/funder-2.jpg" alt="" class="w-full h-full absolute inset-0 object-cover">
                        </a>
                        <div class="flex-1 relative sm:mt-0 mt-4">
                            <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2">Naveen's Boston Marathon & Charles River Marathon </a>
                            <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Stella Johnson</a> </div>
                            <div class="mt-1 text-sm font-medium"> 416 Donated</div>
                            <div class="mt-3">
                                <div class="text-blue-500 font-medium mb-2"> <span> 132,000</span> <span> of</span> <span> 92,000,000</span> Raised </div>
                                <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                    <div class="bg-blue-600 w-1/4 h-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                        <a href="timeline-fundraiser.html" class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                            <img src="assets/images/funding/funder-4.jpg" alt="" class="w-full h-full absolute inset-0 object-cover">
                        </a>
                        <div class="flex-1 relative sm:mt-0 mt-4">
                            <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2">Striding for a Cure for Cystic Fibrosis </a>
                            <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Adrian Mohani</a> </div>
                            <div class="mt-1 text-sm font-medium"> 320 Donated</div>
                            <div class="mt-3">
                                <div class="text-blue-500 font-medium mb-2"> <span> 132,000</span> <span> of</span> <span> 92,000,000</span> Raised </div>
                                <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                    <div class="bg-blue-600 w-1/2 h-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="lg:w-1/3 w-full lg:mt-0 mt-7">

                <div class="card mb-6">
                    <div class="card-media h-28">
                        <div class="card-media-overly"></div>
                        <img src="assets/images/funding/funder-1.jpg" alt="" class="">
                    </div>
                    <div class="p-5">
                        <h4 class="text-xl font-semibold mb-1"> Create a fundraiser </h4>
                        <p class="font-medium"> Fundraiser make it easy to support friends, family and the causes that are important to you such as:</p>

                        <div class="mt-4 text-base font-medium space-y-2">
                            <div class="flex items-center">
                                <ion-icon name="medkit" class="text-lg mr-3"></ion-icon> Medical
                            </div>
                            <div class="flex items-center">
                                <ion-icon name="school" class="text-lg mr-3"></ion-icon> Education
                            </div>
                            <div class="flex items-center">
                                <ion-icon name="heart-circle" class="text-lg mr-3"></ion-icon> Nunprofits and more
                            </div>
                        </div>
                        <a href="#" class="bg-gray-100 rounded-lg text-center py-2 block mt-6 font-medium"> Raise Money</a>
                    </div>
                </div>
                <div>
                    <div class="text-xl font-semibold mb-1"> We're here to help</div>
                    <div class="text-gray-400"> Answers to common questions about fundraisers </div>
                </div>

                <ul class="space-y-3.5 mt-5" uk-accordion>
                    <li class="uk-open bg-gray-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">Who can create fundraiser?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Only people from certain countries can create fundraisers on Socialite at this time. For a complete list, click to see the full article.</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                        </div>
                    </li>
                    <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">How do charities receive donations?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>If you create a fundraiser for a charity, the charity will receive donations directly from Socialite, from Network for Good or from PayPal Giving Fund.</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                        </div>
                    </li>
                    <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">How do taxes work?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                        </div>
                    </li>
                    <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                        <a class="uk-accordion-title text-base font-semibold" href="#">How do fees work?</a>
                        <div class="uk-accordion-content mt-2.5">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                            <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
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
            <h2 class="uk-modal-title">Add Donation</h2>
        </div>
        <!-- <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
            <div>
                Your order is ₦3,400
            </div>
            <input type="hidden" name="public_key" value="FLWPUBK_TEST-SANDBOXDEMOKEY-X" />
            <input type="hidden" name="tx_ref" value="bitethtx-019203" />
            <input type="hidden" name="amount" value="3400" />
            <input type="hidden" name="currency" value="NGN" />
            <input type="hidden" name="redirect_url" value="https://demoredirect.localhost.me/" />
            <input type="hidden" name="meta[token]" value="54" />
            <input type="hidden" name="customer[name]" value="Jesse Pinkman" />
            <input type="hidden" name="customer[email]" value="jessepinkman@walterwhite.org" />
            <button type="submit" id="start-payment-button">Pay Now</button>
        </form>
        <form method="POST" action="{{ route('fundraise.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="title" required name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title') }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> </span>
                </div>

                <div class="line">
                    <input class="line__input" id="target" required name="target" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('acronyms') }}" autocomplete="off">
                    <span for="target" class="line__placeholder"> Amount to raise </span>
                </div>

                <div class="line">
                    <input class="line__input" id="description" required name="description" type="text" onkeyup="this.setAttribute('value', this.value);" value="+234{{ old('phone') }}" autocomplete="off">
                    <span for="description" class="line__placeholder"> description </span>
                </div>

                <div class="line">
                    <input class="line__input" id="image" required name="image" type="file" onkeyup="this.setAttribute('value', this.value);" value="{{ old('address') }}" autocomplete="off">
                    <span for="image" class="line__placeholder"> Image </span>
                </div>


            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                <p class="text-sm leading-6"> </p>
                <button class="button blue" type="submit">ADD</button>
                
            </div>

        </form> -->
        <form id="paymentForm" method="POST" action="{{ route('payment.checkout') }}">
    <input type="hidden" name="amount" value="500" />
    <input type="hidden" name="email" value="user@example.com" />
    <input type="hidden" name="metadata" value="{{ json_encode($array) }}" />
    <button type="button" onclick="payWithFlutterwave()">Pay with Flutterwave</button>
</form>

    </div>
</div>
@endsection