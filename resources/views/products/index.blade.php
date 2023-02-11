@extends('layouts.main')
@section('title', 'All Product')

@section('main')

<div class="main_content">
    <div class="mcontainer">

        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                 <h5 class="text-1xl font-semibold">
                    <a href="{{ route('products.create') }}"><i class="icon-material-outline-add"></i> New
                        Products </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}</p>
    @endif

        <div class="relative" uk-slider="finite: true">
            @if ($products->count() > 0)

            <div class="uk-slider-container px-1 py-3">
                <ul
                    class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                    @foreach ($products as $product)
                    @if (auth()->user()->id === $product->user_id)
                    <li>
                        <a href="{{ route('products.show', $product) }}">
                            <div class="card">
                                <div class="card-media h-40">
                                    <div class="card-media-overly"></div>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    <span class="absolute bg-white px-2 py-1 text-sm rounded-md m-2">
                                        {{ $product->type }}</span>
                                    <button
                                        class="bg-red-100 absolute right-2 top-2 p-0.5 px-1.5 rounded-full text-red-500">
                                        <i class="icon-feather-heart"> </i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div
                                        class="-top-3 absolute bg-blue-100 font-medium px-2 py-1 right-2 rounded-full text text-blue-500 text-sm">
                                        {{ $product->currency }}{{ number_format($product->price, 2) }}

                                    </div>
                                    <div class="text-xs font-semibold uppercase text-yellow-500">{{ $product->category
                                        }}</div>
                                    <div class="ext-lg font-medium mt-1 t truncate"> {{ $product->name }} </div>
                                    <br>
                                    <hr>
                                    <a href="{{ route('products.edit', $product) }}" class="">
                                        <i class="uil-edit-alt mr-1"></i>Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('Hey, Are you sure about this?');">
                                            <span class="icon-feather-trash-2"></span> Delete</button>

                                    </form>
                                </div>
                            </div>

                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            @endif

            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

        </div>
    </div>
</div>
</div>
@endsection
