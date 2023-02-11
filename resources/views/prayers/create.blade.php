@extends('layouts.main')@section('title', 'Add Prayers')@section('main')<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li><a href="{{ route('prayers.index')}}">All Prayer</a></li>
                    <li class="active"><a href="#">Add New Prayer </a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">@if (session('status')) <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status')}} </p>@endif <div class="py-4 border-b flex justify-between px-6">
                <h3 class="text-lg font-semibold">Add Prayer </h3>
                <div></div>
            </div>
            <form method="POST" action="{{ route('prayers.store')}}" enctype="multipart/form-data">@csrf <div class="p-10 space-y-7">
                    <div class="line"><input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('title')}}" autocomplete="off"><span for="title" class="line__placeholder">Title </span></div>@error('title') <p style="color: red; ">{{ $message}} </p>@enderror <div class="line"><input class="line__input" id="author" name="author" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('author')}}" autocomplete="off"><span for="title" class="line__placeholder">Anchor/Author </span></div>@error('author') <p style="color: red; ">{{ $message}} </p>@enderror 
                    <div class="line"><input class="line__input" id="publication" name="publication" type="date" onkeyup="this.setAttribute('value', this.value);" value="{{ old('publication')}}" autocomplete="off"><span for="publication" class="line__placeholder">Date to Publish</span></div>@error('publication') <p style="color: red; ">{{ $message}} </p>@enderror <div class="form-group"><textarea name="content" placeholder="Content" class="with-border px-3 py-3 ">{{ old('content')}}</textarea></div>
                </div>
                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                    <p class="text-sm leading-6">Your Daily Prayer Is Subject to Review and Proof-reading. Ensure To Be Accurate And Concise. </p><button class="button dark" type="submit">PUBLISH</button>
                </div>
            </form>
        </div>
    </div>
</div>@endsection