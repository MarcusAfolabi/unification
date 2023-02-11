@extends('layouts.main')
@section('title', $product->name )
@section('description', $product->name)
@section('keywords', 'selling product, buying product, items, amazon, shop, shopping, shoprite, justrite, ikeja mall, allen avenue mall,
ecommerce, facebook, facebook shop, shop, buyers, sellers, small business, enterprise')
@section('canonical', 'https://cnsunification.org/products')

@section('main')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=562231884526354&autoLogAppEvents=1"
    nonce="t3DkjUu0"></script>
<div class="main_content">
    <div class="mcontainer">

        <!--  Feeds  -->
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7">



                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset($product->user->profile_photo_url) }}"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-black"> {{ $product->user->name }}
                                    {{ $product->user->lastname }} </a>
                                <div class="text-gray-700 flex items-center space-x-2">
                                    {{ $product->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                <ul class="space-y-1">

                                    <li>
                                        <div class="fb-share-button"
                                            data-href="https://web.facebook.com/isokancampusfellowship"
                                            data-layout="button" data-size="small"><a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', $product) }}&amp;text={{ $product->title }}&amp;src=sdkpreparse"
                                                class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                <i class="icon-brand-facebook-square"> </i> Share</a>
                                        </div>

                                    </li>
                                    <li>

                                        <a href="https://twitter.com/share?url={{ route('products.show', $product) }}&amp;text=-{{ $product->title }}&amp;text=By {{ $product->user->name }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="icon-brand-twitter-square"> </i> Share</a>
                                    </li>
                                    <li>

                                        <a href="https://api.whatsapp.com/share?url={{ route('products.show', $product) }}"
                                            target="_blank"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="icon-brand-whatsapp-square"> </i> Share</a>
                                    </li>
                                    @auth
                                    <li>
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-edit-alt mr-1"></i> Edit Product
                                        </a>
                                    </li>

                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Hey, Are you sure about this?');">
                                                <span class="icon-feather-trash-2"></span> Delete</button>

                                        </form>
                                    </li>
                                    @endauth
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div uk-lightbox>
                        <a href="{{ asset($product->image1) }}">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="max-h-96 w-full object-cover">
                        </a>
                    </div>

                    <div class="p-4 space-y-3 relative">
                        <div class="text-2xl font-semibold pt-2"> {{ $product->name }}</div>
                        <p> {!! $product->description !!}</p>

                        <div
                            class="top-3 absolute bg-gray-100 font-semibold px-3 py-1 right-3 rounded-full text text-sm">
                            {{ $product->currency }}{{ number_format($product->price) }}
                        </div>

                        <div class="flex space-x-3 items-center text-sm md:pt-3">
                            <div>Condition: {{ $product->type }}</div>
                            <div class="md:block hidden">·</div>
                            <div class="font-semibold text-yellow-500"> {{ $product->stock }}</div>
                            <div class="md:block hidden">·</div>
                            <div class="flex"> Brand: &nbsp;<span class="font-semibold text-yellow-500 mr-2">
                                    {{ $product->brand }} </span> </div>
                        </div>

                        <hr>

                        <div class="grid grid-cols-2 gap-4 mb-5">

                            <a href="tel:{{ $product->user->phoneNumber }}"
                                class="bg-gray-200 flex flex-1 font-semibold h-10 items-center justify-center px-4 rounded-md">
                                Call seller
                            </a>
                            <a href="mailto:{{ $product->user->email }}"
                                class="bg-red-600 flex flex-1 font-semibold h-10 items-center justify-center px-4 rounded-md text-white">
                                Email Seller
                            </a>

                        </div>
                        <div class="fb-like"
                            data-href="https://cnsunification.org/{{ route('products.show', $product) }}" data-width=""
                            data-layout="button_count" data-action="like" data-size="small" data-share="false">

                            <br>
                            <a href="#" class="hover:text-blue-600 hover:underline"> Product Review </a>



                            <div class="fb-comments"
                                data-href="https://.cnsunification.org/{{ route('products.show', $product) }}"
                                data-width="" data-numposts="5"></div>

                        </div>

                    </div>
                </div>


            </div>
            <div class="lg:w-72 w-full">
                <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                    <h3 class="text-line-through font-semibold mb-1"> Other Products </h3>
                    @foreach ($sidepros as $sidepro)
                    <a href="{{ route('products.show', $sidepro) }}">
                        <div class="-mx-2 duration-300 flex hover:bg-gray-50 px-2 py-2 rounded-md">
                            <img src="{{ asset($sidepro->image) }}" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6"> <strong> {{ $sidepro->name }} </strong> for
                                <strong> {{ $sidepro->currency }}{{ number_format($sidepro->price) }} </strong>

                            </p>
                        </div>
                    </a>
                    @endforeach

                </div>
                <a href="{{ route('products.index') }}" class="hover:text-blue-600 hover:underline"> See All </a>
            </div>
        </div>

    </div>
</div>
@endsection
