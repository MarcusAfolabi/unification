@extends('layouts.main')
@section('title', 'Members Product')
@section('description', 'All Product')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-product" uk-toggle><i class="icon-material-outline-add"></i> Add New </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}
        </p>
        @endif
        <x-jet-validation-errors class="mb-4" />
        <div class="card">
            @if ($my_products->count() > 0)
            <div class="px-1 py-3">
                <ul class=" uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                    @foreach ($my_products as $product)
                    <li>
                        <a href="{{ route('products.show', $product) }}">
                            <div class="card">
                                <div class="card-media h-40">
                                    <div class="card-media-overly"></div>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    <span class="absolute bg-white px-2 py-1 text-sm rounded-md m-2">
                                        {{ $product->type }}</span>
                                    <button class="bg-red-100 absolute right-2 top-2 p-0.5 px-1.5 rounded-full text-red-500">
                                        <i class="icon-feather-heart"> </i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="-top-3 absolute bg-blue-100 font-medium px-2 py-1 right-2 rounded-full text text-blue-500 text-sm">
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
                                        <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                            <span class="icon-feather-trash-2"></span> Delete</button>

                                    </form>
                                </div>
                            </div>

                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
<div id="modal-product" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Add New Product</h2>
            <h5>You can add non eatable products. Potential customers would call you to take their orders. You're solely responsible for the shipping!</h5>
        </div>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" name="name" required type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Product Name</span>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2">
                        <label> Condition </label>
                        <select id="type" name="type" required class="selectpicker with-border">
                            <option value="{{ old('name') }}"> {{ old('name') }} </option>
                            <option value="New"> New </option>
                            <option value="Refurbished"> Refurbished </option>
                            <option value="Used"> Used </option>
                            <option value="Services"> Services </option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label> Currency </label>
                        <select id="currency" required name="currency" class="selectpicker with-border">
                            <option value="{{ old('currency') }}"> {{ old('currency') }} </option>
                            <option value="₦"> NGN (₦) </option>
                            <option value="$"> USD ($) </option>
                            <option value="€"> EURO (&#xa3;) </option>
                            <option value="FREE"> FREE </option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label> Price </label>
                        <input value="{{ old('price') }}" required type="number" name="price" class="with-border w-full">
                    </div>
                    <div class="col-span-2">
                        <label> Category </label>
                        <select id="category" name="category" required class="selectpicker with-border">
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
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2">
                        <label for="stock"> Product Inventory </label>
                        <select id="stock" name="stock" required class="shadow-none selectpicker with-border">
                            <option value="{{ old('stock') }}">{{ old('stock') }}</option>
                            <option value="Low Stock">Low Stock (less than 40 units)</option>
                            <option value="In Stock">In Stock (greater than 40 units)</option>
                            <option value="Pre Order">Pre Order</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label> Brand Name</label>
                        <input value="{{ old('brand') }}" required placeholder="CHANEL" type="text" name="brand" class="with-border w-full">
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="image" required accept="image/*" name="image">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                            Product Cover Image</a>
                    </div>
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg blue:bg-blue-800 blue:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="image1" required accept="image/*" name="image1">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                            Product Back Image</a>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="description" class="with-border px-3 py-3" id="description" placeholder="Give a full description of this product" >
                    {{ old('description') }}</textarea>

                </div>
            </div>


            <!-- form footer -->
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                <p class="text-sm leading-6"> Your Product Listing Is Subject to Review and Proof-reading.
                    Ensure To Be
                    Accurate And Concise. </p>
                <button class="button blue" type="submit">ENLIST</button>
            </div>
        </form>
    </div>
</div>
@endsection