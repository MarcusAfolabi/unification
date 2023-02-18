@extends('layouts.main')
@section('title', 'Contact Us')
@section('description', 'Contact us if you have any questions about our church. We will try to provide an answer')
@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key')}}"></script>
<div class="main_content">
    <div class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">

        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> Leave a message </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Contact us if you have any questions about our church. We will try to provide an answer </div>
        </div>
    </div>
    <div class="mcontainer">

        <div class="-mt-16 bg-white max-w-2x1 mx-auto p-10 relative rounded-md shadow">
            @if (session('status'))
            <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md uk-alert">
                {{ session('status') }}
            </p>
            @endif
            <x-jet-validation-errors class="mb-4" />
            <form method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">

                    <input type="text" placeholder="Your Name" name="name" id="name" required class="with-border">
                    <input type="email" placeholder="Email address" name="email" id="email" required class="with-border">
                    <input type="text" placeholder="Subject" name="subject" max="99" required class="with-border">
                    <input type="tel" placeholder="Phone Number" max="12" id="tel" name="phone" required class="with-border py-4 px-4">
                    <textarea placeholder="How can we help" rows="5" maxlength="255" name="message" required class="with-border md:col-span-2 p-5 px-7 resize-none h-72"></textarea>
                    <div class="md:col-span-2 md:flex items-center justify-between">
                        <div class="g-recaptcha" required data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>

                        <button type="submit" name="send" class="button bg-blue-700 w-full md:w-auto md:mt-0 mt-4"> Submit </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmit(token) {
        document.getElementById("register").submit();
    }
</script>

@endsection