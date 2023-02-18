@extends('layouts.main')
@section('title', 'All Product')
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
            {{ session('status') }}</p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="product"
                        placeholder="Search Products, Brands and more.." autocomplete="off">
                </form>
            </div>
            @if ($products->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-blue-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">By
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Product</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Type</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Price</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Category</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Stock</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Delete</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-blue-900 px-6 py-4 text-left">
                                            Views</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($product->image) }}"> <img
                                                    src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                    class="rounded-lg" style="max-height: 50px; max-width:50px"
                                                    srcset=""></a></th>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('user.index', $product->user->id) }}">
                                                {{ $product->user->name }} </a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->type }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->currency }}{{ number_format($product->price, 2) }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->category }}</td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->stock }}</td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $product->created_at->diffForHumans() }}</td>

                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('products.edit', $product) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">

                                            <script
                                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                                                crossorigin="anonymous"></script>

                                            <div class="switches-list">
                                                <div class="switch-container">
                                                    @if($product->status =='1')
                                                    <label class="switch"><a
                                                            href="{{ url('/status', $product) }}"><input type="checkbox"
                                                                checked>
                                                            <span class="switch-button"></span>Active</a> </label>
                                                    @else
                                                    <label class="switch"> <a
                                                            href="{{ url('/status', $product) }}"><input
                                                                type="checkbox">
                                                            <span class="switch-button"></span>InActive </a></label>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->views }} Viewed</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> <span class="icon-material-outline-user"></span>
                            Sorry, nothing to show</p>
                        @endif
                    </div>
                </div>
            </div> 
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
