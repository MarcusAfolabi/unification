@extends('layouts.main')
@section('title', 'Edit Resource')

@section('main')
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="{{ route('resource.index') }}">All Resources</a>
                        </li>
                        <li class="active">
                            <a href="#">Add New Resource </a>
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
                    <h3 class="font-bold text-xl"> Edit {{ $resource->name }} </h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('resource.update', $resource) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="name" name="name" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}"
                                autocomplete="off">
                            <span for="name" class="line__placeholder"> Name </span>
                        </div>
                        @error('name')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        <div uk-form-custom class="w-full py-3">
                        <label>File</label>

                            <div
                                class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-12">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div>
                            <input type="file" id="file" name="file">
                            <a href="#"
                                    class="bg-gray-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                                    PDF, DOCS, JPEG or PNG</a>
                        </div>
                        @error('file')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                         
                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> Your Post Is Subject to Review and Proof-reading. Ensure To Be
                            Accurate And Concise. </p>
                        <button class="button dark" type="submit">POST</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
 
@endsection
