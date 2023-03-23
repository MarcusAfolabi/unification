@extends('layouts.main')
@section('title', $fundraise->title )
@section('description', $fundraise->description)
@section('main')
<div class="main_content">
    <div class="mcontainer"> 
        <div class="profile lg:rounded-b-xl"> 
            <div class="profiles_banner">
                <img src="{{ asset('storage' . $fundraise->image) }}" alt="{{ $fundraise->title }}" class="z-10">
            </div>
            <div class="profiles_content">
                <div class="profile_info lg:p-3">
                    <h1> {{ $fundraise->title }} </h1>
                    <div class="flex space-x-2 items-center md:pt-3 text-base md:justify-start justify-center">
                        <div>
                            by <a href="#" class="font-medium"> Central Executive Council</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 lg:absolute bottom-0 right-0 p-6 z-10 justify-center md:text-base font-medium">
                    <a href="#" class="flex items-center justify-center h-10 px-6 rounded-md space-x-1.5 bg-blue-200">
                        <i class="icon-brand-whatsapp"></i> <span> Share </span>
                    </a>
                    <a href="#modal-donation" uk-toggle class="flex items-center justify-center h-10 px-6 rounded-md space-x-1.5 hover:text-white bg-red-600 text-white">
                        <i class="icon-feather-heart"></i> <span> Donate</span>
                    </a>
                </div>
            </div> 
        </div>

        <div class="md:flex  md:space-x-8 lg:mx-14">
            <div class="space-y-5 flex-shrink-0 md:w-7/12"> 
                <div class="card p-7"> 
                    <div class="font-bold text-2xl"> Goal </div> 
                    <div class="my-4">
                        <div class="text-blue-500 mb-4 text-lg font-medium"> <span> N200.00</span> <span> of</span> <span> N{{ number_format($fundraise->target, 2) }}</span> Raised </div>
                        <div class="bg-blue-50 rounded-2xl h-2 w-full relative overflow-hidden">
                            <div class="bg-blue-600 w-1/3 h-full"></div>
                        </div>
                    </div> 
                    <div class="text-blue-400"> Raised by 98 people in 719 days</div>

                </div>

                <div class="card p-7">

                    <div class="space-y-4">

                        <div class="space-y-4">
                            <h1 class="block text-xl font-bold"> Description </h1>
                        </div>
                        <div class="line-clamp-3" id="more-text">
                            {{ $fundraise->description }}
                        </div>
                        <a href="#" id="more-text" uk-toggle="target: #more-text ; cls: line-clamp-3"> See more </a>

                    </div>

                </div>

            </div> 
            <div class="w-full flex-shirink-0">

                <div class="card px-6 py-7">
                    <div class="mb-7">
                        <h4 class="text-xl font-semibold"> Fundraiser progress </h4>
                        <div class="grid grid-flow-col gap-2 mt-4 text-center">
                            <a href="#" class="hover:bg-blue-100 rounded-md py-2">
                                <h4 class="font-bold text-2xl block mt-3"> 86 </h4>
                                <div class="mt-1"> Donated </div>
                            </a>
                            <a href="#" class="hover:bg-blue-100 rounded-md py-2">
                                <h4 class="font-bold text-2xl block mt-3"> {{ $fundraise->views }} </h4>
                                <div class="mt-1"> Shared </div>
                            </a>
                        </div>

                    </div>

                    <hr class="-mx-6 my-5 border-blue-100">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h4 class="text-xl -mb-0.5 font-semibold"> Related Donations </h4>
                            </div>
                            <a href="#" class="text-blue-600 ">See all</a>
                        </div>
                        <div>
                            @foreach($fundlists as $fundlist)
                            <div class="flex items-center  hover:bg-blue-100 rounded-md -mx-2 p-2 pr-0">
                                <div class="flex-shrink-0 h-16 mr-3 relative rounded-md w-16">
                                    <img src="{{ asset('storage' . $fundlist->image) }}" class="absolute w-full h-full inset-0 rounded-md object-cover" alt="">
                                </div>
                                <div class="flex-1">
                                    <a href="{{ route('fundraise.show', $fundraise) }}" class="capitalize font-semibold line-clamp-1 mb-1 text-base">{{ $fundlist->title }}</a>
                                    <div class="font-medium text-sm text-blue-400 flex items-center">
                                        <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                        142 People donated
                                    </div>
                                    <div class="mt-2">
                                        <div class="bg-blue-50 rounded-2xl h-1 w-full relative overflow-hidden">
                                            <div class="bg-blue-600 w-1/3 h-full"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
                <input type="hidden" readonly name="public_key" value="FLWPUBK_TEST-6624206f3ef249fc7901c1ae8eaf98ee-X" />
                <input type="hidden" readonly name="tx_ref" value="annualconvention-2023" /> 
                <input type="hidden" readonly name="currency" value="NGN" />
                <input type="hidden" readonly name="redirect_url" value="https://unification.test/redirect/" />
                @php $token = bin2hex(openssl_random_pseudo_bytes(16)); @endphp
                <input type="hidden" readonly name="meta[token]" value="{{ $token }}" /> 
                <div class="line">
                    <input class="line__input" id="amount" required name="amount" type="number" onkeyup="this.setAttribute('value', this.value);" value="{{ old('amount') }}" autocomplete="on">
                    <span for="amount" class="line__placeholder"> Amount </span>
                </div> 
                <div class="line">
                    <select id="category" name="tx_ref" class="shadow-none selectpicker with-border"> 
                        @foreach($funds as $fund)
                        <option value="{{ $fund->id }}">{{ $fund->title }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="line">
                    <textarea class="line__input" id="description" required name="customizations[description]" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('description') }}" autocomplete="off"></textarea>
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