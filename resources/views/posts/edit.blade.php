@extends('layouts.main')
@section('title', 'Edit Post')

@section('main')
<div class="main_content">
    <div class="mcontainer">

                <!--  breadcrumb -->
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('posts.index') }}">All Post</a>
                    </li>
                    <li class="active">
                        <a href="">Editing Post </a>
                    </li>
                </ul>
            </div>
        </div>

            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">

                <!-- form header -->
                @if(session('status'))
                <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">{{ session('status') }}</p>
                 @endif
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Edit Post </h3>
                </div>


                <!-- form body -->

                <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-10 space-y-7">
                        <div class="line">
                            <input class="line__input" id="postTitle" name="postTitle" type="text"
                                onkeyup="this.setAttribute('value', this.value);" value="{{ $post->postTitle }}" autocomplete="off">
                            <span for="postTitle" class="line__placeholder"> Title </span>
                        </div>
                        @error('postTitle')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        <label>Change Cover Image</label>


                        <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                         <a href="{{ asset($post->postImage) }}" title="{{ $post->postTitle }}">   <img src="{{ asset($post->postImage) }}" alt="{{ $post->postTitle }}"
                                class="w-full h-full absolute inset-0 object-cover"></a>
                        </div>
                        <input type="file" id="image" name="image"  multiple>

                        @error('image')
                        <p style="color: red; ">{{ $message }} </p>
                        @enderror
                        <hr>
                         
                        <div class="text-lg font-semibold mb-2">Other Images</div>
                        <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
                            <div>
                                <a class="uk-inline" href="{{ asset($post->postImages) }}" data-caption="{{ $post->postTitle }}">
                                    <img src="{{ asset($post->postImages) }}" alt="{{ $post->postTitle }}">
                                </a>
                            </div>
                            <div>
                                <a class="uk-inline" href="{{ asset($post->postImagess) }}" data-caption="{{ $post->postTitle }}">
                                    <img src="{{ asset($post->postImagess) }}" alt="{{ $post->postTitle }}">
                                </a>
                            </div>  
                        </div>
                        <label>Upload 2 More Images</label> 
                        <input type="file" id="image" name="image1" >
                        <input type="file" id="image" name="image2" >
                        <div>
                            <label for="postCategories"> Post Category </label>
                            <select id="postCategories" name="postCategories"  class="shadow-none selectpicker with-border " required>
                                <option value="{{ $post->postCategories }}">{{ $post->postCategories }}</option>
                                <option value="Bible Study">Bible Study</option>
                                <option value="Anniversary Post">Anniversary Post</option>
                                <option value="Anniversary Post">Events Post</option>
                                <option value="CEC">CEC</option>
                        </select>
                        </div>
                        @error('postCategories')
                        <p style="color: red; ">{{ $message }} </p>
                        @enderror

                    <div class="form-group">
                         <textarea name="fullDescription" id="fullDescription" placeholder="Content" rows="5" cols="30">
                            {{ $post->fullDescription }}</textarea>

                    </div>
                        @error('fullDescription')
                            <p style="color: red; ">{{ $message }} </p>
                        @enderror
                    </div>

                    <!-- form footer -->
                    <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
                        <p class="text-sm leading-6"> Your Post Is Subject to Review and Proof-reading. Ensure To Be
                            Accurate And Concise. </p>
                         <button class="button dark" type="submit" >POST</button>&nbsp; &nbsp;
                         <a href="{{ route('posts.index') }}" <button class="button dark" >BACK</button></a>
                    </div>
                </form>
            </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#fullDescription' ) )
    .then( fullDescription => {
            console.log( fullDescription );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
@endsection

