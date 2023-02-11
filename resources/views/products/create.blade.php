@extends('layouts.main')
@section('title', 'Create Product')

@section('main') 
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('products.index') }}">All Products</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('products.create') }}">List New Product</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
                @if (session('status'))
                    <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
                        {{ session('status') }}</p>
                @endif
                <!-- form header -->
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> List New Product</h3>
                </div>


                <!-- form body -->
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Product Name</span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-2">
                                <label> Condition </label>
                                <select id="type" name="type" class="selectpicker with-border">
                                    <option value="{{ old('name') }}"> {{ old('name') }} </option>
                                    <option value="New"> New </option>
                                    <option value="Refurbished"> Refurbished </option>
                                    <option value="Used"> Used </option>
                                    <option value="Services"> Services </option>
                                </select>
                            </div>
                            @error('type')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div class="col-span-2">
                                <label> Currency </label>
                                <select id="currency" name="currency" class="selectpicker with-border">
                                    <option value="{{ old('currency') }}"> {{ old('currency') }} </option>
                                    <option value="₦"> NGN (₦) </option>
                                    <option value="$"> USD ($) </option>
                                    <option value="€"> EURO (&#xa3;) </option>
                                    <option value="FREE"> FREE </option>
                                </select>
                            </div>
                            @error('currency')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror

                            <div class="col-span-2">
                                <label> Price </label>
                                <input value="{{ old('price') }}" type="number" name="price" class="with-border w-full">
                            </div>
                            @error('price')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div class="col-span-2">
                                <label> Category </label>
                                <select id="category" name="category" class="selectpicker with-border">
                                    <option value="{{ old('category') }}">{{ old('category') }}</option>
                                    <option value="Apparel &amp; Accessories">Apparel &amp; Accessories</option>
                                    <option value="Home Need">Home Daily Needs</option>
                                    <option value="Jewelry &amp; Watches">Jewelry &amp; Watches</option>
                                    <option value="Health &amp; Beauty">Health &amp; Beauty</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Baby Products">Baby Products</option>
                                    <option value="Gifts">Gifts Items</option>
                                    <option value="Others">Other Services</option>
                                </select>
                            </div>
                            @error('category')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-2">
                                <label for="stock"> Product Availability </label>
                                <select id="stock" name="stock" class="shadow-none selectpicker with-border " required>
                                    <option value="{{ old('stock') }}">{{ old('stock') }}</option>
                                    <option value="Low Stock">Low Stock (less than 40 units)</option>
                                    <option value="In Stock">In Stock (greater than 40 units)</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                            @error('stock')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                            <div class="col-span-2">
                                <label> Brand Name</label>
                                <input value="{{ old('brand') }}" placeholder="CHANEL" type="text" name="brand" class="with-border w-full">
                            </div>
                            @error('brand')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        </div>

                         <div class="grid grid-cols-2 gap-4">
                            <div uk-form-custom class="w-full py-3">
                                <div
                                    class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-12">
                                        <path
                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                    </svg>
                                </div>
                                <input type="file" id="image" accept="image/*" name="image">
                                <a href="#"
                                    class="bg-gray-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                                    Product Cover Image</a>
                            </div>
                            @error('image')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror
                            <div uk-form-custom class="w-full py-3">
                                <div
                                    class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-12">
                                        <path
                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                    </svg>
                                </div>
                                <input type="file" id="image1" accept="image/*" name="image1">
                                <a href="#"
                                class="bg-gray-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                                Product Back Image</a>
                            </div>
                            @error('image1')
                                <p style="color: red; ">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="description" placeholder="Product description" rows="5" cols="30">
                        {{ old('description') }}</textarea>

                        </div>
                        @error('description')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                    </div>


                        <!-- form footer -->
                        <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                            <p class="text-sm leading-6"> Your Product Listing Is Subject to Review and Proof-reading.
                                Ensure To Be
                                Accurate And Concise. </p>
                            <button class="button dark" type="submit">SELL</button>
                        </div>
                </form>
            </div>
        </div>
    </div> 

    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(description => {
                console.log(description);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
