@extends('layouts.main')
@section('title', 'All Product')

@section('main')

<div class="main_content">
    <div class="mcontainer">
        @auth
        @if (auth()->user()->isAdmin())
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('products.create') }}"><i class="icon-material-outline-add"></i> New Product </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
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
                                <thead class="border-b bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">By
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Product</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Type</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Price</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Category</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Stock</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Date</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Views</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($product->image) }}"> <img
                                                    src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                    class="rounded-lg" style="max-height: 50px; max-width:50px"
                                                    srcset=""></a></th>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('member.index', $product->user->id) }}">
                                                {{ $product->user->name }} </a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->type }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->currency }}{{ number_format($product->price, 2) }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->category }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $product->stock }}</td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> {{
                                            $product->created_at->diffForHumans() }}</td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('products.edit', $product) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

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
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
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
            @endif
        </div>
    </div>

    @endauth
</div>
@endsection
