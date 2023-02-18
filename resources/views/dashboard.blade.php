@extends('layouts.main')
@section('main')
<div class="main_content">
    <div class="mcontainer"> 
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                </ul>
            </div>
        </div> 
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            @if (session('status'))
            <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
                {{ session('status') }}
            </p>
            @endif 
            <div class="text-center border-b border-blue-100 py-6">
                <h3 class="font-bold text-xl"> Send Notification </h3>
            </div> 
            <form method="POST" action="{{ url('send') }}">
                @csrf
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input class="line__input" id="greeting" name="greeting" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('greeting') }}" autocomplete="off">
                        <span for="greeting" class="line__placeholder"> Greetings </span>
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="body" placeholder="Content" rows="5" cols="30">
                        {{ old('body') }}</textarea>

                    </div>

                    <div class="line">
                        <input class="line__input" id="actiontext" name="actiontext" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('actiontext') }}" autocomplete="off">
                        <span for="actiontext" class="line__placeholder"> Action Text </span>
                    </div>
                    <div class="line">
                        <input class="line__input" id="url" name="url" type="url" onkeyup="this.setAttribute('value', this.value);" value="{{ old('url') }}" autocomplete="off">
                        <span for="url" class="line__placeholder"> Action Url </span>
                    </div>
                    <div class="line">
                        <input class="line__input" id="footer" name="footer" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('footer') }}" autocomplete="off">
                        <span for="footer" class="line__placeholder"> Footer </span>
                    </div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#body'))
                            .then(body => {
                                console.log(body);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </div> 
                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-blue-50 rounded-b-md">
                    <p class="text-sm leading-6">Ensure to preview before you send. </p>
                    <button class="button dark" type="submit">SEND TO MEMBERS</button>
                </div> 
            </form> 
        </div> 
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .then(body => {
            console.log(body);
        })
        .catch(error => {
            console.error(error);
        });
</script> 
@endsection