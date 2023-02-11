@extends('layouts.main')
@section('title', 'All Resources')
@section('description', 'This is all resources from Central Executives Council For Unification Campus Fellowship')
@section('keywords', 'resources, books, audio, pdf, product, buying product, items, amazon, shop, shopping, shoprite, justrite, ikeja mall, allen avenue mall,
ecommerce, facebook, facebook shop, shop, buyers, sellers, small business, enterprise')
@section('canonical', 'https://cnsunification.org/products')

@section('main')
<div class="main_content">
    <div class="mcontainer">
                <div class="md:mb-4 mb-3">
                    <h2 class="text-2xl font-semibold"> Isokan CEC Resources </h2>
                </div> 
                <div class="divide-y card px-4">          
                    @forelse($resources as $resource)          
                    <div class="flex md:space-x-6 space-x-4 md:py-5 py-3 relative">
                        <a href="{{ route('resource.show', $resource) }}" class="md:w-64 md:h-40 w-36 h-24 overflow-hidden rounded-lg relative shadow-sm">
                             <img src="{{ asset('assets/images/isokan_logo.png') }}" alt="{{ ucwords($resource->name) }}" class="w-full h-full absolute inset-0 object-cover">
                             <div class="absolute bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs top-2.5 left-2.5">
                                CEC
                             </div>
                        </a>
                        <div class="flex-1 space-y-2">
                            <a href="{{ route('resource.show', $resource) }}" class="md:text-xl font-semibold line-clamp-2"> {{ ucwords($resource->name) }} </a>
                            <a href="{{ route('resource.show', $resource) }}" class="font-semibold block text-sm"> Admin</a>
                           <div class="flex items-center justify-between">
                                <div class="flex space-x-3 items-center text-sm md:pt-3 font-medium">
                                    <div> <i class="icon-feather-sliders mr-2"></i>  </div>
                                    <div class="md:block hidden">·</div>
                                    <div> <i class="icon-feather-users mr-2"></i> 120 Download</div>
                                </div>
                                <a href="{{ asset($resource->file) }}"
                                    download="{{ asset($resource->file) }}" class="md:flex items-center justify-center h-9 px-8 rounded-md border hidden bg-gray-100">Download Now </a>
                            </div> 
                        </div>
                    </div> 
                    @empty
                    <h6 class=" text-center font-semibold"> Not available at the moment </h6>
                    @endforelse
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection