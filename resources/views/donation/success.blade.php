@extends('layouts.main')
@section('title', 'Donation')
@section('description', 'God loves a cheerful giver. Donate to the buiding of the church and her needs')
@section('keywords', 'donation, helping hands, help, donating, giving, fund raising, empowerment')
@section('canonical', 'https://cnsunification.org/donation')
@section('main')
<div class="main_content">
    <div class="mcontainer">
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-2/3">
                <div class="my-2 flex items-center justify-between pb-3">
                    <div>
                        <h2 class="text-xl font-semibold"> Thank you! 👍 🤩 <br> Your donation has been received</h2>
                    </div>
                    @if (session('status'))
                    <p class="bg-blue-500 text-white text-center border p-4 relative rounded-md">
                        {{ session('status') }}
                    </p>
                    @endif

                    <a href="{{route('welcome') }}">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection