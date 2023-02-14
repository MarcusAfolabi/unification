@extends('layouts.main')
@section('title', 'Edit Audio')

@section('main')
<div class="main_content">
    <div class="mcontainer">

        <!--  breadcrumb -->
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('audios.index') }}">All Audio</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('audios.create') }}">Create New Audio </a>
                    </li>
                </ul>
            </div>
        </div>
        <x-jet-validation-errors class="mb-4" />
        <!-- create page-->
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            @if (session('status'))
            <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
                {{ session('status') }}
            </p>
            @endif
            <!-- form header -->
            <div class="py-4 border-b flex  justify-between px-6">
                <h3 class="text-lg font-semibold"> Edit Audio </h3>
                <div>
                    <div class="font-semibold px-2.5 py-1 bg-blue-100  rounded-md text text-blue-500 text-sm mr-8">
                        Saved as draft
                    </div>
                </div>
            </div>


            <!-- form body -->

            <form method="POST" action="{{ route('audios.update', $audio) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $audio->title }}" autocomplete="off">
                        <span for="title" class="line__placeholder"> Title </span>
                    </div>
                    <div class="line">
                        <input class="line__input" id="author" name="author" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $audio->author }}" autocomplete="off">
                        <span for="author" class="line__placeholder"> Preacher/Composer/ArtistName </span>
                    </div>
                    <label>Cover Image</label>
                    <div class="grid lg:grid-cols-3 gap-3">
                        <div uk-form-custom class="w-full py-3">
                            <div class="bg-blue-100 border-2 border-dashed flex flex-col h-15 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                                <img src="{{ asset($audio->image) }}" style="max-height: 100%; max-width:100%">
                            </div>
                        </div>
                        @if($audio->file)
                        <div uk-form-custom class="w-full py-3">
                            <div class="bg-blue-100 border-2 border-dashed flex flex-col h-15 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                                <svg width="100px" height="119px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M862 779.3c-6.8 0-12.3-5.5-12.3-12.3V514.1c0-45.2-8.9-89.2-26.6-130.7-17-40.1-41.4-76.1-72.3-107.1-31-31-67-55.3-107.1-72.3-41.5-17.6-85.4-26.6-130.7-26.6-45.2 0-89.2 8.9-130.7 26.6-40.1 17-76.1 41.4-107.1 72.3-31 31-55.3 67-72.3 107.1-17.6 41.5-26.6 85.4-26.6 130.7v252.8c0 6.8-5.5 12.3-12.3 12.3s-12.3-5.5-12.3-12.3V514.1c0-48.6 9.6-95.8 28.5-140.3 18.3-43 44.4-81.6 77.6-114.9 33.2-33.2 71.9-59.3 114.9-77.6 44.5-18.9 91.7-28.5 140.3-28.5 48.6 0 95.8 9.6 140.3 28.5 43 18.3 81.6 44.4 114.9 77.6 33.2 33.2 59.3 71.9 77.6 114.9 18.9 44.5 28.5 91.7 28.5 140.3v252.8c0 6.9-5.5 12.4-12.3 12.4z" fill="#154B8B" />
                                    <path d="M99.9 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                    <path d="M99.9 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0.1 42.1-34.2 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c0-28.5-23.2-51.8-51.8-51.8z" fill="#154B8B" />
                                    <path d="M926.1 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                    <path d="M926.1 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0 42.1-34.3 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c-0.1-28.5-23.3-51.8-51.8-51.8zM527.2 762.9c-0.9 0-1.8-0.1-2.7-0.2-6.5-1.1-11.6-6-13-12.5l-41.8-192-71.5 107.3c-3 4.5-8 7.2-13.4 7.2h-92.6c-8.9 0-16.1-7.2-16.1-16.1s7.2-16.1 16.1-16.1h84L464 508.8c3.6-5.4 10-8.1 16.4-6.9 6.4 1.2 11.4 6.1 12.8 12.4l41.4 190.3 39.6-63.6c2.9-4.7 8.1-7.6 13.7-7.6h146c8.9 0 16.1 7.2 16.1 16.1s-7.2 16.1-16.1 16.1h-137l-55.8 89.7c-3.1 4.8-8.4 7.6-13.9 7.6z" fill="#154B8B" />
                                </svg>
                                <audio controls>
                                    <source src="{{ asset($audio->file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                        @endif
                        @if($audio->url)
                        <div uk-form-custom class="w-full py-3">
                            <div class="bg-blue-100 border-2 border-dashed flex flex-col h-15 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                                <svg width="100px" height="119px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M862 779.3c-6.8 0-12.3-5.5-12.3-12.3V514.1c0-45.2-8.9-89.2-26.6-130.7-17-40.1-41.4-76.1-72.3-107.1-31-31-67-55.3-107.1-72.3-41.5-17.6-85.4-26.6-130.7-26.6-45.2 0-89.2 8.9-130.7 26.6-40.1 17-76.1 41.4-107.1 72.3-31 31-55.3 67-72.3 107.1-17.6 41.5-26.6 85.4-26.6 130.7v252.8c0 6.8-5.5 12.3-12.3 12.3s-12.3-5.5-12.3-12.3V514.1c0-48.6 9.6-95.8 28.5-140.3 18.3-43 44.4-81.6 77.6-114.9 33.2-33.2 71.9-59.3 114.9-77.6 44.5-18.9 91.7-28.5 140.3-28.5 48.6 0 95.8 9.6 140.3 28.5 43 18.3 81.6 44.4 114.9 77.6 33.2 33.2 59.3 71.9 77.6 114.9 18.9 44.5 28.5 91.7 28.5 140.3v252.8c0 6.9-5.5 12.4-12.3 12.4z" fill="#154B8B" />
                                    <path d="M99.9 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                    <path d="M99.9 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0.1 42.1-34.2 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c0-28.5-23.2-51.8-51.8-51.8z" fill="#154B8B" />
                                    <path d="M926.1 850.7c-35.4 0-64.1-28.7-64.1-64.1V618.5c0-35.4 28.7-64.1 64.1-64.1 35.4 0 64.1 28.7 64.1 64.1v168.1c0 35.4-28.7 64.1-64.1 64.1z" fill="#9ED5E4" />
                                    <path d="M926.1 863c-42.1 0-76.4-34.3-76.4-76.4V618.5c0-42.1 34.3-76.4 76.4-76.4s76.4 34.3 76.4 76.4v168.1c0 42.1-34.3 76.4-76.4 76.4z m0-296.3c-28.5 0-51.8 23.2-51.8 51.8v168.1c0 28.5 23.2 51.8 51.8 51.8 28.5 0 51.8-23.2 51.8-51.8V618.5c-0.1-28.5-23.3-51.8-51.8-51.8zM527.2 762.9c-0.9 0-1.8-0.1-2.7-0.2-6.5-1.1-11.6-6-13-12.5l-41.8-192-71.5 107.3c-3 4.5-8 7.2-13.4 7.2h-92.6c-8.9 0-16.1-7.2-16.1-16.1s7.2-16.1 16.1-16.1h84L464 508.8c3.6-5.4 10-8.1 16.4-6.9 6.4 1.2 11.4 6.1 12.8 12.4l41.4 190.3 39.6-63.6c2.9-4.7 8.1-7.6 13.7-7.6h146c8.9 0 16.1 7.2 16.1 16.1s-7.2 16.1-16.1 16.1h-137l-55.8 89.7c-3.1 4.8-8.4 7.6-13.9 7.6z" fill="#154B8B" />
                                </svg>
                                <audio controls>
                                    <source src="{{ asset($audio->url) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="image" accept="image/*" name="image">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                            Choose Audio Cover</a>
                    </div>
                    <label>Audio File (15MB max)</label>

                    @if($audio->file)
                    <div uk-form-custom class="w-full py-3">
                        <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                        </div>
                        <input type="file" id="file" accept="audio/*" name="file">
                        <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                            *Choose URL if greater than 15mb</a>
                    </div>
                    @endif

                    @if($audio->url)
                    <div class="line">
                        <input class="line__input" id="url" name="url" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ $audio->url }}" autocomplete="off">
                        <span for="video_url" class="line__placeholder"> Audio URL - Must be with .mp3, else it'll fail</span>
                    </div>
                    @endif

                    <label>Audio Detail</label>
                    <div class="form-group">
                        <textarea name="content" id="content" class="with-border px-3 py-3">
                        {{ $audio->content }}</textarea>
                    </div>
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                        <button class="button blue" type="submit">UPDATE</button>&nbsp; &nbsp;
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection