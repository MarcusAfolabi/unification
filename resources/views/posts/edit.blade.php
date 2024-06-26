@extends('layouts.main')
@section('title', 'Edit Post')

@section('main')
<div class="main_content">
    <div class="mcontainer">

        <div class="py-0 breadcrumb-area">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('posts.index') }}">
                            < Back</a>
                    </li>
                    <li class="active">
                        <a href="">Editing Post </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- create page-->
        <div class="max-w-2xl m-auto bg-white rounded-md shadow-md lg:mt-20">

            <!-- form header -->
            @if(session('status'))
            <p class="relative p-4 text-center text-white bg-blue-500 border rounded-md uk-alert">{{ session('status') }}</p>
            @endif
            <div class="py-6 text-center border-b border-blue-100">
                <h3 class="text-xl font-bold"> Edit Post </h3>
            </div>
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $post->title }}" autocomplete="off">
                        <span for="title" class="line__placeholder"> Title </span>
                    </div>
                    @error('title')
                    <p style="color: red; ">{{ $message }} </p>
                    @enderror
                    <div class="line">
                        <input class="line__input" id="intro" name="intro" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $post->intro }}" autocomplete="off">
                        <span for="intro" class="line__placeholder"> Intro </span>
                    </div>
                    <label>Current Images</label>

                    @if(count($post->images) > 0)
                    <div class="grid gap-3 lg:grid-cols-3">
                        @foreach ($post->images as $img)
                        <div uk-form-custom class="w-full py-3">
                            <div class="relative flex flex-col items-center justify-center w-full bg-gray-100 border-2 border-dashed rounded-lg h-15 dark:bg-gray-800 dark:border-gray-600">
                                <a href="{{ url('post/deleteimage/'.$img->id.'/delete') }}">
                                    <!-- <form action="{{ route('post.deleteimage', $img->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" uk-tooltip="Delete Post Image" onclick="return confirm('Hey, Are you sure about this {{$post->title}} Post Images?');">
                                            <span style="color: red" class="icon-feather-trash-2"></span> Delete
                                            Image
                                        </button>
                                    </form> -->
                                </a>
                                <img src="{{ asset('storage/' . $img->path) }}" style="max-height: 100%; max-width:100%">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <hr>

                        @if(count($post->images) < 5) <label> Add more Images </label>
                        <div class="line">
                            <input class="line__input" type="file" id="image" accept="image/*" multiple name="image[]" onkeyup="this.setAttribute('value', this.value);" value="{{ $post->intro }}" autocomplete="off">
                        </div>
                        @endif

                        <div>
                            <label for="category"> Post Category </label>
                            <select id="category" name="category" class="shadow-none selectpicker with-border " required>
                                <option value="{{ $post->category }}">{{ $post->category }}</option>
                                <option value="Anniversary">Annual Anniversary </option>
                                <option value="Fellowship">Fellowship Activities </option>
                                @if(auth()->user()->role==='admin') <option value="CEC">CEC News</option>@endif
                            </select>
                        </div>
                        @error('category')
                        <p style="color: red; ">{{ $message }} </p>
                        @enderror

                        <div class="form-group">
                            <textarea name="content" id="content" placeholder="Content" rows="5" cols="30">
                            {{ $post->content }}</textarea>

                        </div>
                        @error('content')
                        <p style="color: red; ">{{ $message }} </p>
                        @enderror
                </div>

                <!-- form footer -->
                <div class="flex justify-between border-t lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                    <p class="text-sm leading-6"> Your Post Is Subject to Review and Proof-reading. Ensure To Be
                        Accurate And Concise. </p>
                    <button class="button blue" type="submit">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
